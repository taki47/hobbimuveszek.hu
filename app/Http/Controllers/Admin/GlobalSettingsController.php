<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Image;

use App\Models\Global_setting;
use App\Logging;

class GlobalSettingsController extends Controller
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
        $globalSettings = Global_setting::all();
        return view("Admin.GlobalSettings.Index")
            ->with("globalSettings",$globalSettings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.GlobalSettings.Create");
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
                "unique:global_settings"
            ]
        ];
        $messages = [
            "name.required" => __("admin.globalSettings.validate.name"),
            "name.unique" => __("admin.globalSettings.validate.nameUnique")
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        $type = "1";
        if ( $request->type!="" )
            $type = $request->type;
        
        
        $globalSetting = new Global_setting();
        $globalSetting->name = $request->name;
        $globalSetting->type = $type;
        $globalSetting->save();

        Log::channel('daily')->info($this->logging->log("GLOBAL_SETTING",$globalSetting->id,"NEW GLOBAL SETTING","SUCCESS"));

        return redirect(route("adminGlobalSettings"))
            ->withSuccess(__("admin.globalSettings.create.success"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $globalSetting = Global_setting::findOrFail($id);

        return view('Admin.GlobalSettings.Edit')
            ->with('globalSetting', $globalSetting);
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
        $globalSetting = Global_setting::findOrFail($id);

        $rules = [
            "name" => "required"
        ];
        $messages = [
            "name.required" => __("admin.globalSettings.validation.name")
        ];

        if ( $request->name!=$globalSetting->name ) {
            $rules["name"] = "unique:global_settings";
            $messages["name.unique"] = __("admin.globalSettings.validation.nameUnique");
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        //ok, mehet DB-be
        $log = "";
        if ( $globalSetting->name!=$request->name ) {
            $log = "Name: ".$globalSetting->name." -> ".$request->name;
            $globalSetting->name = $request->name;
        }

        if ( $globalSetting->type )
        {
            if ( $request->file('value') ) {
                $image = $request->file('value');

                //méret
                $size = $image->getSize();
                if ( $size==0 )
                    return back()
                        ->withErrors(__('admin.globalSettings.validation.imageSize'))
                        ->withInput();

                //csak kép
                $mimeType = explode("/",$image->getClientMimeType());
                if ( $mimeType[0]!="image" )
                    return back()
                        ->withErrors(__('admin.globalSettings.validation.isImage'))
                        ->withInput();
                
                //megfelelő kiterjesztés
                $ext = $image->getClientOriginalExtension();
                if ( !($ext=="jpeg" || $ext=="png" || $ext=="jpg" || $ext=="gif" || $ext=="ico") ) {
                    return back()
                        ->withErrors(__('admin.globalSettings.validation.mimeType'))
                        ->withInput();
                }
                
                $imageInfo = pathinfo($image->getClientOriginalName());
                
                $imageName = $request->fileName;
                
                $destinationPath = public_path("/assets/images/");
                
                if ( $globalSetting->id=="4" ) {
                    //$img->save($destinationPath.'/'.$imageName);
                    $image->move($destinationPath, $imageName);
                } else {
                    $img = Image::make($image->path());
                    $img->encode("png")
                        ->save($destinationPath.'/'.$imageName);
                }

                $log .= "Change value: ".$imageName.", ";
                $globalSetting->value = $imageName;
            }
            $globalSetting->alt   = $request->alt;
            $globalSetting->title = $request->title;
        }
        else
        {
            if ( $globalSetting->value!=$request->value )
            {
                $log = "Value: ".$globalSetting->value." -> ".$request->value;
                $globalSetting->value = $request->value;
            }
        }

        $globalSetting->save();

        Log::channel('daily')->info($this->logging->log("GLOBAL SETTING",$globalSetting->id,"CHANGE GLOBAL SETTING",$log));

        return redirect(route("adminGlobalSettings"))
            ->withSuccess(__("admin.globalSettings.edit.success"));
    }
}
