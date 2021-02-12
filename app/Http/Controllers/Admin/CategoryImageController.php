<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Image;

use App\Models\Category_image;
use App\Models\Category;
use App\Logging;

class CategoryImageController extends Controller
{
    protected $logging;
    protected $imagePath;
    public function __construct(Request $request)
    {
        $this->logging = new Logging($request);
        $this->imagePath = public_path("/assets/images/categoryImages/");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryImages = Category_image::all();

        return view("Admin.CategoryImage.Index")
            ->with("categoryImages", $categoryImages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where("parent_id", "0")->orderBy("position")->get();

        return view("Admin.CategoryImage.Create")
            ->with("categories", $categories);
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
            "category_id" => [
                "required",
                "exists:categories,id"
            ],
            "image" => [
                "required",
                "file"
            ]
        ];
        $messages = [
            "name.required" => __("admin.categoryImages.validation.name"),
            "category.required" => __("admin.categoryImages.validation.category"),
            "category.exists" => __("admin.categoryImages.validation.categoryExists"),
            "image.required" => __("admin.categoryImages.validation.image")
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
                ->withErrors(__('admin.categoryImages.validation.imageSize'))
                ->withInput();

        //csak kép
        $mimeType = explode("/",$image->getClientMimeType());
        if ( $mimeType[0]!="image" )
            return back()
                ->withErrors(__('admin.categoryImages.validation.isNotImage'))
                ->withInput();
        
        //megfelelő kiterjesztés
        $ext = $image->getClientOriginalExtension();
        if ( !($ext=="jpeg" || $ext=="png" || $ext=="jpg" || $ext=="gif") ) {
            return back()
                ->withErrors(__('admin.categoryImages.validation.imageMimeType'))
                ->withInput();
        }
        
        $imageInfo = pathinfo($image->getClientOriginalName());
        $imageName = Str::slug($imageInfo["filename"]).".".$imageInfo["extension"];

        if ( file_exists($this->imagePath.$imageName) ) {
            $imageName = \Carbon\Carbon::now()->format("U").$imageName;
        }
        
        $img = Image::make($image->path());
        $img->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })
        ->save($this->imagePath.$imageName);

        $categoryImage = new Category_image();
        $categoryImage->name = $request->name;
        $categoryImage->category_id = $request->category_id;
        $categoryImage->image = $imageName;
        $categoryImage->alt = $request->alt;
        $categoryImage->title = $request->title;
        $categoryImage->save();

        Log::channel('daily')->info($this->logging->log("CATEGORY_IMAGE",$categoryImage->id,"NEW CATEGORY IMAGE","SUCCESS"));

        return redirect(route("adminCategoryImages"))
            ->withSuccess(__("admin.categoryImages.create.success"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryImage = Category_image::findOrFail($id);
        $categories = Category::where("parent_id", "0")->orderBy("position")->get();

        return view("Admin.CategoryImage.Edit")
            ->with("categoryImage", $categoryImage)
            ->with("categories", $categories);
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
            "category_id" => [
                "required",
                "exists:categories,id"
            ]
        ];
        $messages = [
            "name.required" => __("admin.categoryImages.validation.name"),
            "category.required" => __("admin.categoryImages.validation.category"),
            "category.exists" => __("admin.categoryImages.validation.categoryExists"),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        
        $categoryImage = Category_image::findOrFail($id);

        if ( $request->file('image') ) {
            $image = $request->file('image');
        
            //méret
            $size = $image->getSize();
            if ( $size==0 )
                return back()
                    ->withErrors(__('admin.categoryImages.validation.imageSize'))
                    ->withInput();

            //csak kép
            $mimeType = explode("/",$image->getClientMimeType());
            if ( $mimeType[0]!="image" )
                return back()
                    ->withErrors(__('admin.categoryImages.validation.isNotImage'))
                    ->withInput();
            
            //megfelelő kiterjesztés
            $ext = $image->getClientOriginalExtension();
            if ( !($ext=="jpeg" || $ext=="png" || $ext=="jpg" || $ext=="gif") ) {
                return back()
                    ->withErrors(__('admin.categoryImages.validation.imageMimeType'))
                    ->withInput();
            }
            
            $imageInfo = pathinfo($image->getClientOriginalName());
            $imageName = Str::slug($imageInfo["filename"]).".".$imageInfo["extension"];

            if ( file_exists($this->imagePath.$imageName) ) {
                $imageName = \Carbon\Carbon::now()->format("U").$imageName;
            }

            //régi törlése
            $oldImage = $this->imagePath.$categoryImage->image;
            if ( file_exists($oldImage) )
                unlink($oldImage);
            
            $img = Image::make($image->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($this->imagePath.$imageName);

            $categoryImage->image = $imageName;
            $log .= "Change image: ".$imageName.", ";
        }

        if ( $request->name!=$categoryImage->name ) {
            $log .= "Name: ".$categoryImage->name." -> ".$request->name;
            $categoryImage->name = $request->name;
        }
        
        if ( $request->category_id!=$categoryImage->category_id ) {
            $log .= "Category_id: ".$categoryImage->category_id." -> ".$request->category_id;
            $categoryImage->category_id = $request->category_id;
        }
        
        if ( $request->alt!=$categoryImage->alt ) {
            $log .= "Alt: ".$categoryImage->alt." -> ".$request->alt;
            $categoryImage->alt = $request->alt;
        }
        
        if ( $request->title!=$categoryImage->title ) {
            $log .= "Title: ".$categoryImage->title." -> ".$request->title;
            $categoryImage->title = $request->title;
        }
        $categoryImage->save();

        Log::channel('daily')->info($this->logging->log("CATEGORY_IMAGE",$categoryImage->id,"UPDATE CATEGORY IMAGE",$log));

        return redirect(route("adminCategoryImages"))
            ->withSuccess(__("admin.categoryImages.edit.success"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryImage = Category_image::findOrFail($id);

        $oldImage = $this->imagePath.$categoryImage->image;
        if ( file_exists($oldImage) )
            unlink($oldImage);

        $categoryImage->delete();

        $log = "Name: ".$categoryImage->name.", Category id: ".$categoryImage->category_id.", image: ".$categoryImage->image.", Alt: ".$categoryImage->alt.", Title: ".$categoryImage->title;
        
        Log::channel('daily')->info($this->logging->log("CATEGORY_IMAGE",$categoryImage->id,"DELETE CATEGORY IMAGE",$log));

        return redirect(route("adminCategoryImages"))
            ->withSuccess(__("admin.categoryImages.delete.success"));
    }
}
