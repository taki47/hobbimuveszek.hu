<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

use App\Models\User_role;
use App\Logging;

class UserRolesController extends Controller
{
    protected $logging;

    public function __construct(Request $request)
    {
        $this->logging = new Logging($request);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = User_role::all();

        return view("Admin.UserRoles.Index")
            ->with("roles", $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.UserRoles.Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "name" => [
                "required",
                "unique:user_roles"
            ]
        ];
        $messages = [
            "name.required" => __("admin.userRoles.validation.name"),
            "name.unique" => __("admin.userRoles.validation.nameUnique")
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        //ok, mehet DB-be
        $log = "";
        $role = new User_role();
        $role->name = $request->name;
        $role->save();

        Log::channel('daily')->info($this->logging->log("USER_ROLE",$role->id,"NEW USER ROLE","SUCCESS"));

        return redirect(route("adminUserRoles"))
            ->withSuccess(__("admin.userRoles.create.success"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = User_role::findOrFail($id);
        return view("Admin.UserRoles.Edit")
            ->with("role", $role);
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
        $role = User_role::findOrFail($id);

        $rules = [
            "name" => "required"
        ];
        $messages = [
            "name.required" => __("admin.userRoles.validation.name")
        ];

        if ( $request->name!=$role->name ) {
            $rules["name"] = "unique:user_roles";
            $messages["name.unique"] = __("admin.userRoles.validation.nameUnique");
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        //ok, mehet DB-be
        $log = "";
        if ( $role->name!=$request->name ) {
            $log = "Name: ".$role->name." -> ".$request->name;
            $role->name = $request->name;
        }
        $role->save();

        Log::channel('daily')->info($this->logging->log("USER_ROLE",$role->id,"CHANGE USER ROLE",$log));

        return redirect(route("adminUserRoles"))
            ->withSuccess(__("admin.userRoles.edit.success"));
    }
}
