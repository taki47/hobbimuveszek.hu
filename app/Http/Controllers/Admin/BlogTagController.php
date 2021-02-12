<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\Blog_tag;
use App\Logging;

class BlogTagController extends Controller
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
        $tags = Tag::orderBy('name')->get();

        return view('Admin.Tag.index')
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->name;
    }

    public function storeAPI(Request $request)
    {
        //check api token
        $apiToken = $request->apiToken;
        $user = User::where("api_token",$apiToken)->count();
        if ( $user==0 )
            return response()->json('Unauthorized',401);

        $user = User::where("api_token",$apiToken)->first();
        

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:tags',
        ]);
        
        if ($validator->fails())
            return response()->json('{"ERROR": "A megadott cimke létezik!"}',200);
        

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->type = $request->type;
        $tag->url  = Str::slug($request->name);
        $tag->save();

        $tagId = $tag->id;

        Log::channel('daily')->info($this->logging->log("TAG",$tagId,"NEW TAG","SUCCESS"));

        return response()->json('{"name": "'.$request->name.'", "id":"'.$tagId.'"}',200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag       = Tag::findOrFail($id);
        $blog_tags = Blog_tag::where('tag_id',$id)->pluck('blog_id')->toArray();
        $blogs     = Blog::orderBy('name')->get();


        return view('Admin.Tag.edit')
            ->with('tag', $tag)
            ->with('blogs', $blogs)
            ->with('blog_tags', $blog_tags);
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
        $tag = Tag::findOrFail($id);

        $log = "";
        if ( $tag->name != $request->name ) {
            //létezik-e már ez a cimke?
            $issetTag = Tag::where('name',$request->name)->count();

            if ( $issetTag==0 ) {
                $log = "Név: ".$tag->name."->".$request->name.", ";
                $tag->name = $request->name;
                $tag->save();
            } else {
                return back()->withErrors('A cimke neve már létezik. Válassz másikat!');
            }
        }

        $tag->blogs()->sync($request->blogs);
        

        Log::channel('daily')->info($this->logging->log("TAG",$id,"MODIFY TAG",$log));

        return redirect(Route('adminBlogTags',$id))->with('success', 'A cimke módosítása sikerült!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete blog_tags
        Blog_tag::where('tag_id',$id)->delete();

        //delete tag
        $tag = Tag::findOrFail($id);
        $tag->delete();

        $log = "Név: ".$tag->name.", Típus: ".$tag->type;
        Log::channel('daily')->info($this->logging->log("TAG",$id,"DELETE TAG",$log));

        return redirect(Route('adminBlogTags'))->with('success', 'A cimke törlése sikerült!');
    }
}
