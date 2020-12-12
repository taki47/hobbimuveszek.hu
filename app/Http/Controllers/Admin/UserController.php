<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Province;
use App\Logging;


class UserController extends Controller
{
    protected $logging;
    protected $tableHeaders = [
        'id',
        'name',
        'email',
        'phone',
        'status.name',
        'role.name',
        'created_at'
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
        if ( $request->sort!="" ) {
            session(["sortBy"=>$request->sort]);
            session(["sortDirection"=>$request->direction]);
        }

        $users = $user->sortable(["id" => "asc"])->paginate(20);

        return view("Admin.User.Index")
            ->with("users", $users);
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

        return view("Admin.User.Edit")
            ->with("user", $user)
            ->with("provinces", $provinces);
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

        $rules = [
            'name'     => 'required',
            'email'    => [
                    'required',
                    'email'
            ],
            'address'  => 'required',
            'city'     => 'required',
            'state'    => 'required',
            'zip'      => 'required|integer'
        ];

        $messages = [
            'name.required' => __('admin.users.validation.name'),
            'email.required' => __('admin.users.validation.email'),
            'email.email'    => __('admin.users.validation.emailFormat'),
            'address.required' => __('admin.users.validation.address'),
            'city.required' => __('admin.users.validation.city'),
            'state.required' => __('admin.users.validation.state'),
            'zip.required' => __('admin.users.validation.zip'),
            'zip.integer' => __('admin.users.validation.zipInteger')
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        //ha van jelszó, helyességének ellenőrzése
        if ( $request->password!="" ) {
            $rules = [
                'password' => [
                    'min:6',
                    'regex:/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/'
                ]
            ];

            $messages = [
                'password.min' => __('admin.users.validation.passwordLength'),
                'password.regex' => __('admin.users.validation.passwordRegex')
            ];
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }
        }

        //ha e-mail cím változtatás, nem szereplhet az új az adatbázisban
        if ( $request->email!=$user->email ) {
            $rules = [
                'email'    => [
                    'required',
                    'email',
                    'unique:users'
                ]
            ];

            $messages = [
                'email.required' => __('admin.users.validation.email'),
                'email.email'    => __('admin.users.validation.emailFormat'),
                'email.unique'   => __('admin.users.validation.emailExists')
            ];
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }
        }

        //minden ok, módosítás
        $log = "";
        if ( $request->name!=$user->name ) {
            $log .= "Name: ".$user->name."->".$request->name.", ";
            $user->name  = $request->name;
        }
        if ( $request->email!=$user->email ) {
            $log .= "Email: ".$user->email."->".$request->email.", ";
            $user->email  = $request->email;
        }
        if ( $request->password ) {
            $log .= "Password change";
            $user->password  = Hash::make($request->password);
        }
        if ( $request->address!=$user->address ) {
            $log .= "Address: ".$user->address."->".$request->address.", ";
            $user->address  = $request->address;
        }
        if ( $request->address2!=$user->address2 ) {
            $log .= "Address2: ".$user->address2."->".$request->address2.", ";
            $user->address2  = $request->address2;
        }
        if ( $request->city!=$user->city ) {
            $log .= "City: ".$user->city."->".$request->city.", ";
            $user->city  = $request->city;
        }
        if ( $request->state!=$user->province_id ) {
            $log .= "State: ".$user->province_id."->".$request->state.", ";
            $user->province_id  = $request->state;
        }
        if ( $request->zip!=$user->postcode ) {
            $log .= "Postcode: ".$user->postcode."->".$request->zip.", ";
            $user->postcode  = $request->zip;
        }
        $user->save();

        //log
        Log::channel('daily')->info($this->logging->log("USER",$user->id,"CHANGE USER DATA",$log));

        return redirect(route("adminUsers"))->withSuccess(__('admin.users.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
