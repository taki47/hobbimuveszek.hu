<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

use App\Models\Billing_type;
use App\Logging;

class BillingTypesController extends Controller
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
        $billingTypes = Billing_type::all();

        return view("Admin.BillingTypes.Index")
            ->with("billingTypes", $billingTypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.BillingTypes.Create");
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
                "unique:billing_types"
            ]
        ];
        $messages = [
            "name.required" => __("admin.billingTypes.validation.name"),
            "name.unique" => __("admin.billingTypes.validation.nameUnique")
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        //ok, mehet DB-be
        $log = "";
        $billingType = new Billing_type();
        $billingType->name = $request->name;
        $billingType->save();

        Log::channel('daily')->info($this->logging->log("BILLING_TYPE",$billingType->id,"NEW BILLING TYPE","SUCCESS"));

        return redirect(route("adminBillingTypes"))
            ->withSuccess(__("admin.billingTypes.create.success"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $billingType = Billing_type::findOrFail($id);
        return view("Admin.BillingTypes.Edit")
            ->with("billingType", $billingType);
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
        $billingType = Billing_type::findOrFail($id);

        $rules = [
            "name" => "required"
        ];
        $messages = [
            "name.required" => __("admin.billingTypes.validation.name")
        ];

        if ( $request->name!=$billingType->name ) {
            $rules["name"] = "unique:billing_types";
            $messages["name.unique"] = __("admin.billingTypes.validation.nameUnique");
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        //ok, mehet DB-be
        $log = "";
        if ( $billingType->name!=$request->name ) {
            $log = "Name: ".$billingType->name." -> ".$request->name;
            $billingType->name = $request->name;
        }
        $billingType->save();

        Log::channel('daily')->info($this->logging->log("BILLING_TYPE",$billingType->id,"CHANGE BILLING TYPE",$log));

        return redirect(route("adminBillingTypes"))
            ->withSuccess(__("admin.billingTypes.edit.success"));
    }
}
