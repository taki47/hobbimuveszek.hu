<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Logging;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Blog_tag;

class BlogController extends Controller
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
    public function index(Blog $blog)
    {
        $blogs = $blog->sortable(['id' => 'desc'])->paginate(20);

        return view('Admin.Blog.index')
            ->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::where("type",1)->orderBy('name')->get();
        
        return view('Admin.Blog.create')
            ->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name'              => 'required|string|max:255|unique:blogs',
            'image'             => 'required|image',
            'lead'              => 'required|string',
            'content'           => 'required|string',
            'meta_keywords'     => 'required|string|max:255',
            'meta_descriptions' => 'required|string|max:255',
            'image_alt'         => 'required|string|max:255',
            'image_title'       => 'required|string|max:255'
        ]);

        //upload file
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalName();

        $destinationPath = public_path('/blogs/');
        $image->move($destinationPath, $imageName);

        
        $blog = new Blog();
        $blog->name = $request->name;
        $blog->image = $imageName;
        $blog->image_alt = $request->image_alt;
        $blog->image_title = $request->image_title;
        $blog->lead = $request->lead;
        $blog->content = $request->content;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_descriptions = $request->meta_descriptions;
        $blog->user_id = Auth::user()->id;
        $blog->url = Str::slug($request->name);
        $blog->save();

        //sync tags
        $blog->tags()->sync($request->tags);

        //log
        Log::channel('daily')->info($this->logging->log("BLOG",$blog->id,"NEW BLOG","SUCCESS"));

        return redirect(Route('adminBlogs'))->with('success', 'A blog bejegyzés létrehozása sikerült!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $tags = Tag::where('type', '1')->orderBy('name')->get();
        $blog_tags = Blog_tag::where('blog_id',$id)->pluck('tag_id')->toArray();

        return view('Admin.Blog.edit')
            ->with('blog',$blog)
            ->with('tags',$tags)
            ->with('blog_tags',$blog_tags);
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
        $blog = Blog::find($id);
        $log = "";

        //validate
        $request->validate([
            'name'              => 'required|string|max:255',
            'lead'              => 'required|string',
            'content'           => 'required|string',
            'meta_keywords'     => 'required|string|max:255',
            'meta_descriptions' => 'required|string|max:255',
            'image_alt'         => 'required|string|max:255',
            'image_title'       => 'required|string|max:255'
        ]);

        //cím módosításnál létezik a cím?
        if ( $blog->name!=$request->name ) {
            $issetName = Blog::where('name', $request->name)->count();
            if ( $issetName>0 ) {
                return back()
                    ->withInput()
                    ->withErrors('A megadott cím már létezik a rendszerben, válassz másikat!');
            }
        }

        if ( $request->image ) {
            //delete file
            $path = "/blogs/".$blog->image;
            @unlink($path);

            //upload file
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalName();

            $destinationPath = public_path('/blogs/');
            $image->move($destinationPath, $imageName);
        }

        
        if ( $blog->name!=$request->name ) {
            $log .= "Cím: ".$blog->name." -> ".$request->name.",";
            $blog->name              = $request->name;
        }

        if ( $blog->lead!=$request->lead ) {
            $log .= "Bevezető: ".$blog->lead." -> ".$request->lead.",";
            $blog->lead              = $request->lead;
        }

        if ( $blog->content!=$request->content ) {
            $log .= "Törzs: ".$blog->content." -> ".$request->content.",";
            $blog->content           = $request->content;
        }

        if ( $blog->meta_keywords!=$request->meta_keywords ) {
            $log .= "Meta keywords: ".$blog->meta_keywords." -> ".$request->meta_keywords.",";
            $blog->meta_keywords     = $request->meta_keywords;
        }

        if ( $blog->meta_descriptions!=$request->meta_descriptions ) {
            $log .= "Meta description: ".$blog->meta_descriptions." -> ".$request->meta_descriptions.",";
            $blog->meta_descriptions = $request->meta_descriptions;
        }

        if ( $blog->image_title!=$request->image_title ) {
            $log .= "Image title: ".$blog->image_title." -> ".$request->image_title.",";
            $blog->image_title = $request->image_title;
        }

        if ( $blog->image_alt!=$request->image_alt ) {
            $log .= "Image alt: ".$blog->image_alt." -> ".$request->image_alt.",";
            $blog->image_alt = $request->image_alt;
        }

        if ( $request->image ) {
            $log = "Kép: ".$blog->image." -> ".$imageName.",";
            $blog->image             = $imageName;
        }
        $blog->url               = Str::slug($request->name);
        $blog->save();

        //sync tags
        $blog->tags()->sync($request->tags);

        Log::channel('daily')->info($this->logging->log("BLOG",$id,"MODIFY BLOG",$log));

        return redirect(Route('adminBlogs'))->with('success', 'A blog módosítása sikerült!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog     = Blog::find($id);
        $blogTags = Blog_tag::where("blog_id",$id);

        //delete file
        $path = "/blogs/".$blog->image;
        @unlink($path);

        //delete tags
        $blogTags->delete();

        //delete blog
        $blog->delete();

        //log
        $log  = "";
        $log .= "Cím: ".$blog->name.",";
        $log .= "Bevezető: ".$blog->lead.",";
        $log .= "Törzs: ".$blog->content.",";
        $log .= "Meta title: ".$blog->meta_title.",";
        $log .= "Meta description: ".$blog->meta_descriptions;

        Log::channel('daily')->info($this->logging->log("BLOG",$id,"DELETE BLOG",$log));

        return redirect(Route('adminBlogs'))->with('success', 'A blog bejegyzés sikeresen törölve!');
    }
}
