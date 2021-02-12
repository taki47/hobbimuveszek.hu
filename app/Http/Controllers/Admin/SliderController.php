<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Image;

use App\Models\Slider;
use App\Logging;

class SliderController extends Controller
{
    protected $logging;
    protected $imagePath;
    public function __construct(Request $request)
    {
        $this->logging = new Logging($request);
        $this->imagePath = public_path("/assets/images/sliders/");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view("Admin.Slider.Index")
            ->with("sliders", $sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Slider.Create");
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
            "name" => "required",
            "image" => [
                "required",
                "file"
            ]
        ];
        $messages = [
            "name.required" => __("admin.sliders.validation.name"),
            "image.required" => __("admin.sliders.validation.image")
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        $image = $request->file('image');
        
        //méret
        $size = $image->getSize();
        if ( $size==0 )
            return back()
                ->withErrors(__('admin.sliders.validation.imageSize'))
                ->withInput();

        //csak kép
        $mimeType = explode("/",$image->getClientMimeType());
        if ( $mimeType[0]!="image" )
            return back()
                ->withErrors(__('admin.sliders.validation.isNotImage'))
                ->withInput();
        
        //megfelelő kiterjesztés
        $ext = $image->getClientOriginalExtension();
        if ( !($ext=="jpeg" || $ext=="png" || $ext=="jpg" || $ext=="gif") ) {
            return back()
                ->withErrors(__('admin.sliders.validation.imageMimeType'))
                ->withInput();
        }
        
        $imageInfo = pathinfo($image->getClientOriginalName());
        $imageName = Str::slug($imageInfo["filename"]).".".$imageInfo["extension"];

        if ( file_exists($this->imagePath.$imageName) ) {
            $imageName = \Carbon\Carbon::now()->format("U").$imageName;
        }
        
        $img = Image::make($image->path());
        $img->save($this->imagePath.$imageName);

        $slider = new Slider();
        $slider->name = $request->name;
        $slider->image = $imageName;
        $slider->alt = $request->alt;
        $slider->title = $request->title;
        $slider->text = $request->text;
        $slider->position = $request->position;
        $slider->save();

        Log::channel('daily')->info($this->logging->log("SLIDER",$slider->id,"NEW SLIDER","SUCCESS"));

        return redirect(route("adminSliders"))
            ->withSuccess(__("admin.sliders.create.success"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        return view("Admin.Slider.Edit")
            ->with("slider", $slider);
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
        $log = "";
        $rules = [
            "name" => "required"
        ];
        $messages = [
            "name.required" => __("admin.sliders.validation.name"),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        
        $slider = Slider::findOrFail($id);

        if ( $request->file('image') ) {
            $image = $request->file('image');
        
            //méret
            $size = $image->getSize();
            if ( $size==0 )
                return back()
                    ->withErrors(__('admin.sliders.validation.imageSize'))
                    ->withInput();

            //csak kép
            $mimeType = explode("/",$image->getClientMimeType());
            if ( $mimeType[0]!="image" )
                return back()
                    ->withErrors(__('admin.sliders.validation.isNotImage'))
                    ->withInput();
            
            //megfelelő kiterjesztés
            $ext = $image->getClientOriginalExtension();
            if ( !($ext=="jpeg" || $ext=="png" || $ext=="jpg" || $ext=="gif") ) {
                return back()
                    ->withErrors(__('admin.sliders.validation.imageMimeType'))
                    ->withInput();
            }
            
            $imageInfo = pathinfo($image->getClientOriginalName());
            $imageName = Str::slug($imageInfo["filename"]).".".$imageInfo["extension"];

            if ( file_exists($this->imagePath.$imageName) ) {
                $imageName = \Carbon\Carbon::now()->format("U").$imageName;
            }

            //régi törlése
            $oldImage = $this->imagePath.$slider->image;
            if ( file_exists($oldImage) )
                unlink($oldImage);
            
            $img = Image::make($image->path());
            $img->save($this->imagePath.$imageName);

            $slider->image = $imageName;
            $log .= "Change image: ".$imageName.", ";
        }

        if ( $request->name!=$slider->name ) {
            $log .= "Name: ".$slider->name." -> ".$request->name;
            $slider->name = $request->name;
        }
        
        if ( $request->alt!=$slider->alt ) {
            $log .= "Alt: ".$slider->alt." -> ".$request->alt;
            $slider->alt = $request->alt;
        }
        
        if ( $request->title!=$slider->title ) {
            $log .= "Title: ".$slider->title." -> ".$request->title;
            $slider->title = $request->title;
        }

        if ( $request->text!=$slider->text ) {
            $log .= "Text: ".$slider->text." -> ".$request->text;
            $slider->text = $request->text;
        }

        if ( $request->position!=$slider->position ) {
            $log .= "Position: ".$slider->position." -> ".$request->position;
            $slider->position = $request->position;
        }
        $slider->save();

        Log::channel('daily')->info($this->logging->log("SLIDER",$slider->id,"UPDATE SLIDER",$log));

        return redirect(route("adminSliders"))
            ->withSuccess(__("admin.sliders.edit.success"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        $oldImage = $this->imagePath.$slider->image;
        if ( file_exists($oldImage) )
            unlink($oldImage);

        $slider->delete();

        $log = "Name: ".$slider->name.", image: ".$slider->image.", Alt: ".$slider->alt.", Title: ".$slider->title.", Text: ".$slider->text.", position: ".$slider->position;
        
        Log::channel('daily')->info($this->logging->log("SLIDER",$slider->id,"DELETE SLIDER",$log));

        return redirect(route("adminSliders"))
            ->withSuccess(__("admin.sliders.delete.success"));
    }
}
