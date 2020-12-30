<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

use App\Models\Province;
use App\Logging;

class ProvincesController extends Controller
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
        $provinces = Province::all();

        return view("Admin.Provinces.Index")
            ->with("provinces", $provinces);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Provinces.Create");
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
                "unique:provinces"
            ]
        ];
        $messages = [
            "name.required" => __("admin.provinces.validation.name"),
            "name.unique" => __("admin.provinces.validation.nameUnique")
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        //ok, mehet DB-be
        $log = "";
        $province = new Province();
        $province->name = $request->name;
        $province->save();

        Log::channel('daily')->info($this->logging->log("PROVINCE",$province->id,"NEW PROVINCE","SUCCESS"));

        return redirect(route("adminProvinces"))
            ->withSuccess(__("admin.provinces.create.success"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $province = Province::findOrFail($id);
        return view("Admin.Provinces.Edit")
            ->with("province", $province);
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
        $province = Province::findOrFail($id);

        $rules = [
            "name" => "required"
        ];
        $messages = [
            "name.required" => __("admin.provinces.validation.name")
        ];

        if ( $request->name!=$province->name ) {
            $rules["name"] = "unique:provinces";
            $messages["name.unique"] = __("admin.provinces.validation.nameUnique");
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        //ok, mehet DB-be
        $log = "";
        if ( $province->name!=$request->name ) {
            $log = "Name: ".$province->name." -> ".$request->name;
            $province->name = $request->name;
        }
        $province->save();

        Log::channel('daily')->info($this->logging->log("PROVINCE",$province->id,"CHANGE PROVINCE",$log));

        return redirect(route("adminProvinces"))
            ->withSuccess(__("admin.provinces.edit.success"));
    }
}
