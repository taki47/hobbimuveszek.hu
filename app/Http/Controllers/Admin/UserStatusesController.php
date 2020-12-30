<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

use App\Models\User_status;
use App\Logging;

class UserStatusesController extends Controller
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
        $statuses = User_status::all();

        return view("Admin.UserStatuses.Index")
            ->with("statuses", $statuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.UserStatuses.Create");
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
                "unique:user_statuses"
            ]
        ];
        $messages = [
            "name.required" => __("admin.userStatuses.validation.name"),
            "name.unique" => __("admin.userStatuses.validation.nameUnique")
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        //ok, mehet DB-be
        $log = "";
        $status = new User_status();
        $status->name = $request->name;
        $status->save();

        Log::channel('daily')->info($this->logging->log("USER_STATUS",$status->id,"NEW USER STATUS","SUCCESS"));

        return redirect(route("adminUserStatuses"))
            ->withSuccess(__("admin.userStatuses.create.success"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = User_status::findOrFail($id);
        return view("Admin.UserStatuses.Edit")
            ->with("status", $status);
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
        $status = User_status::findOrFail($id);

        $rules = [
            "name" => "required"
        ];
        $messages = [
            "name.required" => __("admin.userStatuses.validation.name")
        ];

        if ( $request->name!=$status->name ) {
            $rules["name"] = "unique:user_statuses";
            $messages["name.unique"] = __("admin.userStatuses.validation.nameUnique");
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        //ok, mehet DB-be
        $log = "";
        if ( $status->name!=$request->name ) {
            $log = "Name: ".$status->name." -> ".$request->name;
            $status->name = $request->name;
        }
        $status->save();

        Log::channel('daily')->info($this->logging->log("USER_STATUS",$status->id,"CHANGE USER STATUS",$log));

        return redirect(route("adminUserStatuses"))
            ->withSuccess(__("admin.userStatuses.edit.success"));
    }
}
