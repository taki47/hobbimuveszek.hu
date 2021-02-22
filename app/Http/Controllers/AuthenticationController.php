<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use Image;

use App\Mail\RegisterMail;
use App\Mail\LostPasswordMail;
use App\Models\Province;
use App\Models\User;
use App\Logging;
use App\Models\Social_media;
use App\Models\User_billing_data;
use App\Models\User_social_media;
use App\Http\Controllers\ApiController;

class AuthenticationController extends Controller
{
    protected $logging;
    protected $maxAttempts = 5;

    public function __construct(Request $request)
    {
        $this->logging = new Logging($request);
    }

    /**
     * LOGIN
     */
    public function Login()
    {
        if ( Auth::user() ) {
            return redirect("/");
        } else {
            return view("Auth.Login");
        }
    }

    public function LoginAttempt(Request $request)
    {
        if ( !$request->ajax ) {
            //captcha ellenőrzése
            $captcha = ApiController::CheckCaptcha($request->gRecaptchaResponse);
            if ( !$captcha )
                return back()
                    ->withErrors(__('auth.register.validation.gRecaptchaResponse'))
                    ->withInput();
        }


        $credentials = $request->only('email', 'password');
        $credentials["user_status_id"] = "2";
        
        if (Auth::attempt($credentials,$request->remember)) {
            //auth passed
            if ( Auth::user()->user_role_id=="4" ) {
                $user = User::find(Auth::user()->id);
                $apiToken = Hash::make(Carbon::now());
                $user->api_token = $apiToken;
                $user->save();
            }

            if ( isset($request->ajax) ) {
                return 1;
            } else {
                return redirect()->intended('/');
            }
        } else {
            if ( isset($request->ajax) ) {
                $error["error-msg"] = __('auth.login.failed');
                return $error;
            } else {
                return back()->withErrors(__('auth.login.failed'));
            }
        }
    }

    /**
     * REGISTER
     */
    public function Register()
    {
        return view('Auth.Register');
    }

    public function SendRegister(Request $request)
    {
        $rules = [
            'name'     => 'required',
            'email'    => [
                    'required',
                    'email',
                    'unique:users'
            ],
            'password' => [
                    'required',
                    'min:6',
                    'regex:/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
                    'confirmed'
            ],
            'term'     => 'required',
            'gRecaptchaResponse' => 'required'
        ];

        $messages = [
            'name.required' => __('auth.register.validation.name'),
            'email.required' => __('auth.register.validation.email'),
            'email.email'    => __('auth.register.validation.emailFormat'),
            'email.unique' => __('auth.register.validation.emailExists'),
            'password.required' => __('auth.register.validation.password'),
            'password.min' => __('auth.register.validation.passwordLength'),
            'password.regex' => __('auth.register.validation.passwordRegex'),
            'password.confirmed' => __('auth.register.validation.passwordConfirm'),
            'term.required' => __('auth.register.validation.term'),
            'gRecaptchaResponse.required' => __('auth.register.validation.gRecaptchaResponse')
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails())
            return back()
                        ->withErrors($validator)
                        ->withInput();
        
        //captcha ellenőrzése
        $captcha = ApiController::CheckCaptcha($request->gRecaptchaResponse);
        if ( !$captcha )
            return back()
                ->withErrors(__('auth.register.validation.gRecaptchaResponse'))
                ->withInput();


        //megerősítő kód előállítása
        $confirmCode = Self::GetConfirmCode();
        
        //slug előállítása
        $slug = Str::slug($request->name);
        $slugCount = User::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->count();
        if ( $slugCount>0 )
            $slug = $slug."-".$slugCount;

        //könyvtár létrehozása
        $path = public_path()."/uploads/".$slug;
        File::makeDirectory($path);

        //regisztrálom adatbázisba
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->confirm = $confirmCode;
        $user->slug = $slug;
        $user->save();

        //log
        Log::channel('daily')->info($this->logging->log("USER",$user->id,"NEW USER","SUCCESS"));

        //email küldése
        \Mail::to($user->email)->send(new RegisterMail($user));

        //siker kiírása
        return redirect(route("registerSuccess"));
    }

    public function RegisterSuccess()
    {
        return view("Auth.RegisterSuccess");
    }

    public function RegisterStepTwo($email,$confirmCode)
    {
        $user = User::where("email",$email)->where("confirm", $confirmCode)->first();
        if ( $user ) {
            //log
            Log::channel('daily')->info($this->logging->log("USER",$user->id,"NEW USER CONFIRM","SUCCESS"));

            $provinces = Province::all();
            $socialMedias = Social_media::all();

            return view("Auth.RegisterStepTwo")
                ->with("provinces", $provinces)
                ->with("socialMedias", $socialMedias)
                ->with("user",$user);
        } else {
            //nincs ilyen kód, hiba oldal

            //log
            Log::channel('daily')->info($this->logging->log("USER",$email,"NEW USER CONFIRM","FAILED"));

            return view("Auth.RegisterConfirmError");
        }
    }

    public function SendRegisterStepTwo(Request $request,$email,$confirmCode)
    {
        $user = User::where("email",$email)->where("confirm", $confirmCode)->first();
        if ( $user ) {
            if ( $request->registerRole=="3" ) {
                //művész regisztráció
                //beérkezett adatok ellenőrzése
                $rules = [
                    'state'    => 'required|string',
                    'zip'      => 'required|integer',
                    'city'     => 'required|string',
                    'address'  => 'required|string',
                ];
                $messages = [
                    'state.required'    => __('auth.register.validation.name'),
                    'zip.required'      => __('auth.register.validation.zip'),
                    'zip.integer'       => __('auth.register.validation.zipInteger'),
                    'city.required'     => __('auth.register.validation.city'),
                    'address.required'  => __('auth.register.validation.address'),
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return back()
                                ->withErrors($validator)
                                ->withInput();
                }

                //ha céges adatokat adott meg, cégnév, adószám kötelező
                if ( $request->billingType=="2" ) {
                    $rules = [
                        'companyName' => 'required|string',
                        'taxNumber'   => 'required|string',
                    ];
                    $messages = [
                        'companyName.required' => __('auth.register.validation.companyName'),
                        'taxNumber.required'   => __('auth.register.validation.taxNumber'),
                    ];
                    $validator = Validator::make($request->all(), $rules, $messages);
                    if ($validator->fails()) {
                        return back()
                                    ->withErrors($validator)
                                    ->withInput();
                    }
                }

                //avatar file mentése
                $avatarAvailable = 0;
                if ( $request->file('avatar') ) {
                    $image = $request->file('avatar');
                    
                    //méret
                    $size = $image->getSize();
                    if ( $size==0 )
                        return back()
                            ->withErrors(__('auth.register.validation.avatarSize'))
                            ->withInput();

                    //csak kép
                    $mimeType = explode("/",$image->getClientMimeType());
                    if ( $mimeType[0]!="image" )
                        return back()
                            ->withErrors(__('auth.register.validation.avatarIsImage'))
                            ->withInput();
                    
                    //megfelelő kiterjesztés
                    $ext = $image->getClientOriginalExtension();
                    if ( !($ext=="jpeg" || $ext=="png" || $ext=="jpg" || $ext=="gif") ) {
                        return back()
                            ->withErrors(__('auth.register.validation.avatarMimeType'))
                            ->withInput();
                    }
                    
                    $imageInfo = pathinfo($image->getClientOriginalName());
                    $imageName = "avatar.png";
                    $destinationPath = public_path("/uploads/".$user->slug."/");
                    
                    $img = Image::make($image->path());
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode("png")
                    ->save($destinationPath.'/'.$imageName);

                    $avatarAvailable = 1;
                }

                //minden ok, mehet adatbázisba
                //user adatainak elmentése
                $user->phone          = $request->phone;
                $user->description    = $request->description;
                $user->avatar         = $avatarAvailable;
                $user->website        = $request->website;
                $user->province_id    = $request->locationState;
                $user->locationCity   = $request->locationCity;
                $user->confirm        = null;
                $user->user_status_id = "2";
                $user->user_role_id   = "3";
                $user->save();

                $log = "Phone: ".$request->phone.", Description: ".$request->description.", Avatar: ".$avatarAvailable.", Website: ".$request->website.", Confirm: null, User_status_id=2, User_role_id=3";
                Log::channel('daily')->info($this->logging->log("USER",$user->id,"NEW USER REG STEP TWO",$log));

                //számlázási cím mentése
                $userBillingData = new User_billing_data();
                $userBillingData->user_id = $user->id;
                $userBillingData->billing_type_id = $request->billingType;
                $userBillingData->company_name    = $request->companyName;
                $userBillingData->tax_number      = $request->taxNumber;
                $userBillingData->address         = $request->address;
                $userBillingData->address2        = $request->address2;
                $userBillingData->city            = $request->city;
                $userBillingData->province_id     = $request->state;
                $userBillingData->postcode        = $request->zip;
                $userBillingData->save();

                Log::channel('daily')->info($this->logging->log("USER_BILLING_DATA",$userBillingData->id,"NEW USER BILLING DATA","SUCCESS"));

                //social mediák
                $socialMedias = Social_media::all();
                foreach ($socialMedias as $socialMedia) {
                    if ( $request->get("social_".$socialMedia->id) ) {
                        $userSocialMedia = new User_social_media();
                        $userSocialMedia->social_media_id = $socialMedia->id;
                        $userSocialMedia->user_id = $user->id;
                        $userSocialMedia->url = $request->get("social_".$socialMedia->id);
                        $userSocialMedia->save();

                        Log::channel('daily')->info($this->logging->log("USER_SOCIAL_MEDIA",$userSocialMedia->id,"NEW USER SOCIAL MEDIA","SUCCESS"));
                    }
                }
                //művész regisztráció
            }

            if ( $request->registerRole=="2" ) {
                //vásárló regisztráció

                //avatar file mentése
                $avatarAvailable = 0;
                if ( $request->file('avatar') ) {
                    $image = $request->file('avatar');
                    
                    //méret
                    $size = $image->getSize();
                    if ( $size==0 )
                        return back()
                            ->withErrors(__('auth.register.validation.avatarSize'))
                            ->withInput();

                    //csak kép
                    $mimeType = explode("/",$image->getClientMimeType());
                    if ( $mimeType[0]!="image" )
                        return back()
                            ->withErrors(__('auth.register.validation.avatarIsImage'))
                            ->withInput();
                    
                    //megfelelő kiterjesztés
                    $ext = $image->getClientOriginalExtension();
                    if ( !($ext=="jpeg" || $ext=="png" || $ext=="jpg" || $ext=="gif") ) {
                        return back()
                            ->withErrors(__('auth.register.validation.avatarMimeType'))
                            ->withInput();
                    }
                    
                    $imageInfo = pathinfo($image->getClientOriginalName());
                    $imageName = "avatar.png";
                    $destinationPath = public_path("/uploads/".$user->slug."/");
                    
                    $img = Image::make($image->path());
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode("png")
                    ->save($destinationPath.'/'.$imageName);

                    $avatarAvailable = 1;
                }

                //user adatainak elmentése
                $user->phone          = $request->phone;
                $user->description    = $request->description;
                $user->avatar         = $avatarAvailable;
                $user->website        = $request->website;
                $user->province_id    = $request->locationState;
                $user->locationCity   = $request->locationCity;
                $user->confirm        = null;
                $user->user_status_id = "2";
                $user->user_role_id   = "2";
                $user->save();

                $log = "Phone: ".$request->phone.", Description: ".$request->description.", Avatar: ".$avatarAvailable.", Website: ".$request->website.", Confirm: null, User_status_id=2, User_role_id=2";
                Log::channel('daily')->info($this->logging->log("USER",$user->id,"NEW USER REG STEP TWO",$log));

                //social mediák
                $socialMedias = Social_media::all();
                foreach ($socialMedias as $socialMedia) {
                    if ( $request->get("social_".$socialMedia->id) ) {
                        $userSocialMedia = new User_social_media();
                        $userSocialMedia->social_media_id = $socialMedia->id;
                        $userSocialMedia->user_id = $user->id;
                        $userSocialMedia->url = $request->get("social_".$socialMedia->id);
                        $userSocialMedia->save();

                        Log::channel('daily')->info($this->logging->log("USER_SOCIAL_MEDIA",$userSocialMedia->id,"NEW USER SOCIAL MEDIA","SUCCESS"));
                    }
                }
                //vásárló regisztráció
            }
            
            return redirect()->route("registerStepTwoSuccess");
        } else {
            //nincs ilyen kód, hiba oldal

            //log
            Log::channel('daily')->info($this->logging->log("USER",$email,"NEW USER CONFIRM","FAILED"));

            return view("Auth.RegisterConfirmError");
        }
    }

    public function RegisterStepTwoSuccess()
    {
        return view("Auth.RegisterConfirmOk");
    }

    public function LostPassword()
    {
        return view("Auth.LostPassword");
    }

    public function SendLostPassword(Request $request)
    {
        //captcha ellenőrzése
        $captcha = ApiController::CheckCaptcha($request->gRecaptchaResponse);
        if ( !$captcha )
            return back()
                ->withErrors(__('auth.register.validation.gRecaptchaResponse'))
                ->withInput();

        //létezik ilyen e-mail cím?
        $user = User::where("email", $request->email)->first();
        if ( $user ) {
            //kód előállítása, email küldése
            $confirmCode = Self::GetConfirmCode();

            $user->confirm = $confirmCode;
            $user->save();
            
            //log
            Log::channel('daily')->info($this->logging->log("USER",$user->id,"SEND LOST PASSWORD","SUCCESS"));

            \Mail::to($user->email)->send(new LostPasswordMail($user));

            return view('Auth.LostPasswordSent');
        } else {
            //nem létezik a user
            return back()->withErrors(__('auth.lostPassword.emailError'))->withInput();
        }
    }

    public function GenerateNewPassword($email, $confirm)
    {
        $user = User::where("email",$email)->where("confirm", $confirm)->first();
        if ( $user ) {
            //megvan a kód
            return view("Auth.LostPasswordGenerate")
                ->with("user", $user);
        } else {
            //nincs ilyen kód, hiba oldal

            //log
            Log::channel('daily')->info($this->logging->log("USER",$email,"LOST PASSWORD CONFIRM","FAILED"));

            return view("Auth.LostPasswordConfirmError");
        }
    }

    public function SendGenerateNewPassword(Request $request, $email, $confirm)
    {
        //captcha ellenőrzése
        $captcha = ApiController::CheckCaptcha($request->gRecaptchaResponse);
        if ( !$captcha )
            return back()
                ->withErrors(__('auth.register.validation.gRecaptchaResponse'))
                ->withInput();
                
        $user = User::where("email",$email)->where("confirm", $confirm)->first();
        if ( $user ) {
            //megvan a kód
            
            //jelszó ellenőrzése
            $rules = [
                'password' => [
                        'required',
                        'min:6',
                        'regex:/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
                        'confirmed'
                ]
            ];
    
            $messages = [
                'password.required' => __('auth.register.validation.password'),
                'password.min' => __('auth.register.validation.passwordLength'),
                'password.regex' => __('auth.register.validation.passwordRegex'),
                'password.confirmed' => __('auth.register.validation.passwordConfirm'),
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }

            //beírom adatbázisba a jelszót
            $user->password = Hash::make($request->password);
            $user->confirm = null;
            $user->save();

            //log
            Log::channel('daily')->info($this->logging->log("USER",$email,"LOST PASSWORD CHANGE","SUCCESS"));

            //megerősítő oldal
            return view('Auth.LostPasswordOk');
        } else {
            //nincs ilyen kód, hiba oldal

            //log
            Log::channel('daily')->info($this->logging->log("USER",$email,"LOST PASSWORD CONFIRM","FAILED"));

            return view("Auth.LostPasswordConfirmError");
        }
    }

    public function Logout()
    {
        Auth::logout();

        return redirect("/");
    }

    private function GetConfirmCode()
    {
        $confirmCode = "";
        $elements = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","1","2","3","4","5","6","7","8","9","0"];
        for ($i=0; $i < 12; $i++) { 
            $confirmCode = $confirmCode . $elements[rand(0,count($elements)-1)];
        }

        return $confirmCode;
    }
}
