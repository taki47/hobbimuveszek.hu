<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Image;

use App\Models\Top_category;
use App\Logging;

class TopCategoryController extends Controller
{
    protected $logging;
    protected $imagePath;
    public function __construct(Request $request)
    {
        $this->logging = new Logging($request);
        $this->imagePath = public_path("/assets/images/topcategories/");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topCategories = Top_category::all();

        return view("Admin.TopCategory.Index")
            ->with("topCategories", $topCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.TopCategory.Create");
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
            ],
            "link" => "required"
        ];
        $messages = [
            "name.required" => __("admin.topcategories.validation.name"),
            "image.required" => __("admin.topcategories.validation.image"),
            "link.required" => __("admin.topcategories.validation.link")
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
                ->withErrors(__('admin.topcategories.validation.imageSize'))
                ->withInput();

        //csak kép
        $mimeType = explode("/",$image->getClientMimeType());
        if ( $mimeType[0]!="image" )
            return back()
                ->withErrors(__('admin.topcategories.validation.isNotImage'))
                ->withInput();
        
        //megfelelő kiterjesztés
        $ext = $image->getClientOriginalExtension();
        if ( !($ext=="jpeg" || $ext=="png" || $ext=="jpg" || $ext=="gif") ) {
            return back()
                ->withErrors(__('admin.topcategories.validation.imageMimeType'))
                ->withInput();
        }
        
        $imageInfo = pathinfo($image->getClientOriginalName());
        $imageName = Str::slug($imageInfo["filename"]).".".$imageInfo["extension"];

        if ( file_exists($this->imagePath.$imageName) ) {
            $imageName = \Carbon\Carbon::now()->format("U").$imageName;
        }
        
        $img = Image::make($image->path());
        $img->save($this->imagePath.$imageName);

        $topCategory = new Top_category();
        $topCategory->name = $request->name;
        $topCategory->image = $imageName;
        $topCategory->alt = $request->alt;
        $topCategory->title = $request->title;
        $topCategory->link = $request->link;
        $topCategory->position = $request->position;
        $topCategory->save();

        Log::channel('daily')->info($this->logging->log("TOP_CATEGORY",$topCategory->id,"NEW TOP CATEGORY","SUCCESS"));

        return redirect(route("adminTopCategories"))
            ->withSuccess(__("admin.topcategories.create.success"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topCategory = Top_category::findOrFail($id);

        return view("Admin.TopCategory.Edit")
            ->with("topCategory", $topCategory);
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
            "name" => "required",
            "link" => "required"
        ];
        $messages = [
            "name.required" => __("admin.topCategories.validation.name"),
            "link.required" => __("admin.topCategories.validation.link"),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        
        $topCategory = Top_category::findOrFail($id);

        if ( $request->file('image') ) {
            $image = $request->file('image');
        
            //méret
            $size = $image->getSize();
            if ( $size==0 )
                return back()
                    ->withErrors(__('admin.topcategories.validation.imageSize'))
                    ->withInput();

            //csak kép
            $mimeType = explode("/",$image->getClientMimeType());
            if ( $mimeType[0]!="image" )
                return back()
                    ->withErrors(__('admin.topcategories.validation.isNotImage'))
                    ->withInput();
            
            //megfelelő kiterjesztés
            $ext = $image->getClientOriginalExtension();
            if ( !($ext=="jpeg" || $ext=="png" || $ext=="jpg" || $ext=="gif") ) {
                return back()
                    ->withErrors(__('admin.topcategories.validation.imageMimeType'))
                    ->withInput();
            }
            
            $imageInfo = pathinfo($image->getClientOriginalName());
            $imageName = Str::slug($imageInfo["filename"]).".".$imageInfo["extension"];

            if ( file_exists($this->imagePath.$imageName) ) {
                $imageName = \Carbon\Carbon::now()->format("U").$imageName;
            }

            //régi törlése
            $oldImage = $this->imagePath.$topCategory->image;
            if ( file_exists($oldImage) )
                unlink($oldImage);
            
            $img = Image::make($image->path());
            $img->save($this->imagePath.$imageName);

            $topCategory->image = $imageName;
            $log .= "Change image: ".$imageName.", ";
        }

        if ( $request->name!=$topCategory->name ) {
            $log .= "Name: ".$topCategory->name." -> ".$request->name;
            $topCategory->name = $request->name;
        }
        
        if ( $request->alt!=$topCategory->alt ) {
            $log .= "Alt: ".$topCategory->alt." -> ".$request->alt;
            $topCategory->alt = $request->alt;
        }
        
        if ( $request->title!=$topCategory->title ) {
            $log .= "Title: ".$topCategory->title." -> ".$request->title;
            $topCategory->title = $request->title;
        }

        if ( $request->link!=$topCategory->link ) {
            $log .= "Link: ".$topCategory->link." -> ".$request->link;
            $topCategory->link = $request->link;
        }

        if ( $request->position!=$topCategory->position ) {
            $log .= "Position: ".$topCategory->position." -> ".$request->position;
            $topCategory->position = $request->position;
        }
        $topCategory->save();

        Log::channel('daily')->info($this->logging->log("TOP_CATEGORY",$topCategory->id,"UPDATE TOP CATEGORY",$log));

        return redirect(route("adminTopCategories"))
            ->withSuccess(__("admin.topcategories.edit.success"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topCategory = Top_category::findOrFail($id);

        $oldImage = $this->imagePath.$topCategory->image;
        if ( file_exists($oldImage) )
            unlink($oldImage);

        $topCategory->delete();

        $log = "Name: ".$topCategory->name.", image: ".$topCategory->image.", Alt: ".$topCategory->alt.", Title: ".$topCategory->title.", Link: ".$topCategory->link.", position: ".$topCategory->position;
        
        Log::channel('daily')->info($this->logging->log("TOP_CATEGORY",$topCategory->id,"DELETE TOP CATEGORY",$log));

        return redirect(route("adminTopCategories"))
            ->withSuccess(__("admin.topcategories.delete.success"));
    }
}
