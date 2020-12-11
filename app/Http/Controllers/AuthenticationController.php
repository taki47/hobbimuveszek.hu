<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

use App\Mail\RegisterMail;
use App\Mail\LostPasswordMail;
use App\Models\Province;
use App\Models\User;
use App\Logging;

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
        if ( !Self::CheckCaptcha($request) ) {
            return back()->withErrors(['captcha' => 'ReCaptcha Error']);
        }

        $credentials = $request->only('email', 'password');
        $credentials["user_status_id"] = ["2","3", "4"];
        
        if (Auth::attempt($credentials,$request->remember)) {
            //auth passed
            return redirect()->intended('/');
        } else {
            return back()->withErrors(__('auth.login.failed'));
        }
    }

    /**
     * REGISTER
     */
    public function Register()
    {
        $provinces = Province::all();

        return view('Auth.Register')
            ->with("provinces", $provinces);
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
            'address1' => 'required',
            'city'     => 'required',
            'state'    => 'required',
            'zip'      => 'required|integer',
            'term'     => 'required'
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
            'address1.required' => __('auth.register.validation.address1'),
            'city.required' => __('auth.register.validation.city'),
            'state.required' => __('auth.register.validation.state'),
            'zip.required' => __('auth.register.validation.zip'),
            'zip.integer' => __('auth.register.validation.zipInteger'),
            'term.required' => __('auth.register.validation.term'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        //megerősítő kód előállítása
        $confirmCode = Self::GetConfirmCode();
        

        //regisztrálom adatbázisba
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address1;
        $user->address2 = $request->address2;
        $user->city = $request->city;
        $user->province_id = $request->state;
        $user->postcode = $request->zip;
        $user->confirm = $confirmCode;
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

    public function Confirm($email,$confirmCode)
    {
        $user = User::where("email",$email)->where("confirm", $confirmCode)->first();
        if ( $user ) {
            //státusz átállítása, megerősítő oldalra továbbítása
            $user->user_status_id = "2";
            $user->confirm = null;
            $user->save();

            //log
            Log::channel('daily')->info($this->logging->log("USER",$user->id,"NEW USER CONFIRM","SUCCESS"));

            return view("Auth.ConfirmOk");
        } else {
            //nincs ilyen kód, hiba oldal

            //log
            Log::channel('daily')->info($this->logging->log("USER",$email,"NEW USER CONFIRM","FAILED"));

            return view("Auth.ConfirmError");
        }
    }

    public function LostPassword()
    {
        return view("Auth.LostPassword");
    }

    public function SendLostPassword(Request $request)
    {
        if ( !Self::CheckCaptcha($request) ) {
            return back()->withErrors(['captcha' => 'ReCaptcha Error']);
        }

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

    private function CheckCaptcha(Request $request)
    {
        //check captcha
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data = [
                'secret' => env("GCAPTCHA_SECRET_KEY"),
                'response' => $request->get('gRecaptchaResponse'),
                'remoteip' => $remoteip
            ];
        $options = [
                'http' => [
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data)
                ]
            ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);

        if ($resultJson->success != true) {
            return false;
        }
        if ($resultJson->score >= 0.3) {
            return true;
        } else {
            return false;
        }
    }
}
