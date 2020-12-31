<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

use App\Models\Page;
use App\Logging;

class PageController extends Controller
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
        $pages = Page::all();

        return view("Admin.Pages.Index")
            ->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Pages.Create");
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
                "unique:pages"
            ],
            "title" => "required"
        ];
        $messages = [
            "name.required" => __("admin.pages.validation.name"),
            "name.unique" => __("admin.pages.validation.nameUnique"),
            "title.required" => __("admin.pages.validation.title")
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        //ok, mehet DB-be
        $log = "";
        $page = new Page();
        $page->name = $request->name;
        $page->title = $request->title;
        $page->description = $request->description;
        $page->keywords = $request->keywords;
        $page->body = $request->body;
        $page->slug = Str::slug($request->name);
        $page->save();

        Log::channel('daily')->info($this->logging->log("PAGE",$page->id,"NEW PAGE","SUCCESS"));

        return redirect(route("adminPages"))
            ->withSuccess(__("admin.pages.create.success"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view("Admin.Pages.Edit")
            ->with("page", $page);
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
        $page = Page::findOrFail($id);

        $rules = [
            "name" => "required",
            "title" => "required"
        ];
        $messages = [
            "name.required" => __("admin.pages.validation.name"),
            "name.unique" => __("admin.pages.validation.nameUnique"),
            "title.required" => __("admin.pages.validation.title")
        ];

        if ( $request->name!=$page->name ) {
            $rules["name"] = "unique:pages";
            $messages["name.unique"] = __("admin.pages.validation.nameUnique");
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        //ok, mehet DB-be
        $log = "";
        if ( $page->name!=$request->name ) {
            $log = "Name: ".$page->name." -> ".$request->name;
            $page->name = $request->name;
            $page->slug = Str::slug($request->name);
        }
        if ( $page->title!=$request->title ) {
            $log = "Title: ".$page->title." -> ".$request->title;
            $page->title = $request->title;
        }
        if ( $page->description!=$request->description ) {
            $log = "Description: ".$page->description." -> ".$request->description;
            $page->description = $request->description;
        }
        if ( $page->keywords!=$request->keywords ) {
            $log = "Keywords: ".$page->keywords." -> ".$request->keywords;
            $page->keywords = $request->keywords;
        }
        if ( $page->body!=$request->body ) {
            $log = "Body: ".$page->body." -> ".$request->body;
            $page->body = $request->body;
        }
        $page->save();

        Log::channel('daily')->info($this->logging->log("PAGE",$page->id,"CHANGE PAGE",$log));

        return redirect(route("adminPages"))
            ->withSuccess(__("admin.pages.edit.success"));
    }
}
