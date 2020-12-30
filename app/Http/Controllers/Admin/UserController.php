<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Image;

use App\Models\User;
use App\Models\Province;
use App\Models\User_status;
use App\Models\User_role;
use App\Models\User_billing_data;
use App\Logging;


class UserController extends Controller
{
    protected $logging;
    protected $pageLimit = 20;
    protected $tableHeaders = [
        'id',
        'name',
        'email',
        'phone',
        'status.name',
        'role.name',
        'created_at'
    ];
    protected $searchFields = [
        'name',
        'email',
        'userStatusId',
        'userRoleId',
    ];

    public function __construct(Request $request)
    {
        $this->logging = new Logging($request);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user,Request $request)
    {
        session()->forget($this->searchFields);

        if ( $request->sort!="" ) {
            session(["sortBy"=>$request->sort]);
            session(["sortDirection"=>$request->direction]);
        }

        $users = $user->sortable(["id" => "asc"])->paginate($this->pageLimit);
        $userStatuses = User_status::all();
        $userRoles = User_role::all();

        return view("Admin.User.Index")
            ->with("users", $users)
            ->with("userStatuses", $userStatuses)
            ->with("userRoles", $userRoles);
    }

    public function search(Request $request)
    {
        if ( $request->search=="true" ) {
            //űrlapból jön, törlöm a session-t
            session()->forget($this->searchFields);
        }

        $name = $request->name;
        if ( $name=="" && session("name") ) {
            $name = session("name");
            $request['name'] = $name;
        }

        $email = $request->email;
        if ( $email=="" && session("email") ) {
            $email = session("email");
            $request['email'] = $email;
        }

        $userStatusId = $request->userStatusId;
        if ( $userStatusId=="" && session("userStatusId") ) {
            $userStatusId = session("userStatusId");
            $request['userStatusId'] = $userStatusId;
        }

        $userRoleId = $request->userRoleId;
        if ( $userRoleId=="" && session("userRoleId") ) {
            $userRoleId = session("userRoleId");
            $request['userRoleId'] = $userRoleId;
        }

        $page = $request->page;
        if ( !$page && session("page") ) {
            $page = session("page");
        } else if ( $page ) {
            session(["page"=>$page]);
        } else {
            $page = "1";
        }

        $query = User::query();
        $query->select('users.*');

        if ( $name ) {
            $query->where("name", "LIKE", "%".$name."%");
            session(["name"=>$name]);
        }
        if ( $email ) {
            $query->where("email", "LIKE", "%".$email."%");
            session(["email"=>$email]);
        }
        if ( $userStatusId && $userStatusId!="-1" ) {
            $query->where("user_status_id", $userStatusId);
            session(["userStatusId"=>$userStatusId]);
        }
        if ( $userRoleId && $userRoleId!="-1" ) {
            $query->where("user_role_id", $userRoleId);
            session(["userRoleId"=>$userRoleId]);
        }
        $query->orderBy("users.name", "asc");

        $users = $query->paginate($this->pageLimit,['*'],'page',$page);
        $paginate = $users->appends($request->all());

        $userStatuses = User_status::all();
        $userRoles = User_role::all();

        return view('Admin.User.Index')
            ->with('users', $users)
            ->with("request", $request->all())
            ->with("userRoles", $userRoles)
            ->with("userStatuses",$userStatuses);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $provinces = Province::all();
        $statuses = User_status::all();
        $roles = User_role::all();

        return view("Admin.User.Edit")
            ->with("user", $user)
            ->with("provinces", $provinces)
            ->with("statuses", $statuses)
            ->with("roles", $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        //kötelező mezők
        $rules = [
            "name" => "required",
            "email" =>[
                "required",
                "email"
            ]
        ];
        $messages = [
            "name.required" => __('admin.users.validation.name'),
            'email.required' => __('admin.users.validation.email'),
            'email.email'    => __('admin.users.validation.emailFormat')
        ];

        //ha művész, számlázási adatok kötelező mezői
        if ( $request->role=="3" ) {
            $rules["billingState"] = "required";
            $rules["billingZip"] = "required";
            $rules["billingCity"] = "required";
            $rules["billingAddress"] = "required";
            
            $messages["billingState.required"] = __("admin.users.validation.billingState");
            $messages["billingZip.required"] = __("admin.users.validation.billingZip");
            $messages["billingCity.required"] = __("admin.users.validation.billingCity");
            $messages["billingAddress.required"] = __("admin.users.validation.billingAddress");

            //ha cég, kell a cégnév, adószám
            if ( $request->billingType=="2" ) {
                $rules["billingCompanyName"] = "required";
                $rules["billingTaxNumber"] = "required";
                $messages["billingCompanyName.required"] = __("admin.users.validation.billingCompanyName");
                $messages["billingTaxNumber.required"] = __("admin.users.validation.billingTaxNumber");
            }
        }

        //ha más az e-mail cím, akkor nem lehet még egyszer a táblában
        if ( $user->email!=$request->email ) {
            $rules["email"][2] = "unique:users";
            $messages["email.unique"] = __("admin.users.validation.emailUnique");
        }

        //ha van jelszó
        if ( $request->password!="" ) {
            $rules["password"][0] = "min:6";
            $rules["password"][1] = "regex:/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/";
            $messages["password.min"] = __("admin.users.validation.passwordLength");
            $messages["password.regex"] = __("admin.users.validation.passwordRegex");
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        //minden ok, módosítás
        $log = "";
        if ( $request->status!=$user->user_status_id ) {
            $log .= "Status: ".$user->user_status_id."->".$request->status.", ";
            $user->user_status_id = $request->status;
        }
        if ( $request->role!=$user->user_role_id ) {
            $log .= "Role: ".$user->user_role_id."->".$request->role.", ";
            $user->user_role_id = $request->role;
        }
        if ( $request->name!=$user->name ) {
            $log .= "Name: ".$user->name."->".$request->name.", ";
            $user->name = $request->name;
        }
        if ( $request->email!=$user->email ) {
            $log .= "Email: ".$user->email."->".$request->email.", ";
            $user->email = $request->email;
        }
        if ( $request->password ) {
            $log .= "Password change";
            $user->password  = Hash::make($request->password);
        }
        if ( $request->phone!=$user->phone ) {
            $log .= "Phone: ".$user->phone."->".$request->phone.", ";
            $user->phone = $request->phone;
        }
        if ( $request->description!=$user->description ) {
            $log .= "Description: ".$user->description."->".$request->description.", ";
            $user->description = $request->description;
        }
        if ( $request->state!=$user->province_id ) {
            $log .= "State: ".$user->province_id."->".$request->state.", ";
            $user->province_id = $request->state;
        }
        if ( $request->locationCity!=$user->locationCity ) {
            $log .= "City: ".$user->locationCity."->".$request->locationCity.", ";
            $user->locationCity = $request->locationCity;
        }

        //avatar file mentése
        if ( $request->file('avatar') ) {
            $image = $request->file('avatar');
            
            //méret
            $size = $image->getSize();
            if ( $size==0 )
                return back()
                    ->withErrors(__('admin.users.validation.avatarSize'))
                    ->withInput();

            //csak kép
            $mimeType = explode("/",$image->getClientMimeType());
            if ( $mimeType[0]!="image" )
                return back()
                    ->withErrors(__('admin.users.validation.avatarIsImage'))
                    ->withInput();
            
            //megfelelő kiterjesztés
            $ext = $image->getClientOriginalExtension();
            if ( !($ext=="jpeg" || $ext=="png" || $ext=="jpg" || $ext=="gif") ) {
                return back()
                    ->withErrors(__('admin.users.validation.avatarMimeType'))
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

            $log .= "Change avatar, ";
            $user->avatar = 1;
        }
        $user->save();
        Log::channel('daily')->info($this->logging->log("USER",$user->id,"CHANGE USER DATA",$log));

        //ha művész, számlázási adatok
        if ( $request->role=="3" ) {
            $log = "";
            $userBillingData = User_billing_data::where("user_id", $user->id)->first();

            if ( $request->billingType!=$userBillingData->billing_type_id ) {
                $log .= "Billing type: ".$userBillingData->billing_type_id."->".$request->billingType.", ";
                $userBillingData->billing_type_id = $request->state;
            }

            if ( $request->billingType=="2" ) {
                //cégnév, adószám
                if ( $request->billingCompanyName!=$userBillingData->company_name ) {
                    $log .= "Billing Company: ".$userBillingData->company_name."->".$request->billingCompanyName.", ";
                    $userBillingData->company_name = $request->billingCompanyName;
                }
                if ( $request->billingTaxNumber!=$userBillingData->tax_number ) {
                    $log .= "Billing TaxNr.: ".$userBillingData->tax_number."->".$request->billingTaxNumber.", ";
                    $userBillingData->tax_number = $request->billingTaxNumber;
                }
            }

            if ( $request->billingState!=$userBillingData->province_id ) {
                $log .= "Billing State: ".$userBillingData->province_id."->".$request->billingState.", ";
                $userBillingData->province_id = $request->billingState;
            }
            if ( $request->billingZip!=$userBillingData->postcode ) {
                $log .= "Billing Zip: ".$userBillingData->postcode."->".$request->billingZip.", ";
                $userBillingData->postcode = $request->billingZip;
            }
            if ( $request->billingCity!=$userBillingData->city ) {
                $log .= "Billing City: ".$userBillingData->city."->".$request->billingCity.", ";
                $userBillingData->city = $request->billingCity;
            }
            if ( $request->billingAddress!=$userBillingData->address ) {
                $log .= "Billing Address: ".$userBillingData->address."->".$request->billingAddress.", ";
                $userBillingData->address = $request->billingAddress;
            }
            if ( $request->billingAddress2!=$userBillingData->address2 ) {
                $log .= "Billing Address2: ".$userBillingData->address2."->".$request->billingAddress2.", ";
                $userBillingData->address2 = $request->billingAddress2;
            }
            $userBillingData->save();
            Log::channel('daily')->info($this->logging->log("USER_BILLING_DATA",$userBillingData->id,"CHANGE USER BILLING DATA",$log));
        }
        
        return redirect(route("adminUsers"))->withSuccess(__('admin.users.success'));        
    }

    public function deleteAvatar($userId)
    {
        $user = User::findOrFail($userId);

        //delete avatar
        $path = public_path()."/uploads/".$user->slug."/avatar.png";
        if ( file_exists($path) )
            unlink($path);

        //update table
        $user->avatar = "0";
        $user->save();

        //log
        Log::channel('daily')->info($this->logging->log("USER",$user->id,"DELETE USER AVATAR","SUCCESS"));

        return redirect(route("adminUserEdit",$userId));
    }
}
