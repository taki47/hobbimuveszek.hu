<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Page;
use App\Models\Slider;
use App\Models\Top_category;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Blog_tag;
use App\Mail\ContactMail;

class PublicController extends Controller
{
    public function Home()
    {
        $sliders = Slider::orderBy("position")->get();
        $topCategories = Top_category::orderBy("position")->get();
        $blogs = Blog::orderBy("created_at","desc")->take(8)->get();
        $page = Page::find("1");

        return view("welcome")
            ->with("page", $page)
            ->with("sliders", $sliders)
            ->with("topCategories", $topCategories)
            ->with("blogs", $blogs);
    }

    public function showPage($slug)
    {
        $page = Page::where("slug", $slug)->first();

        if ( $page ) {
            return view("page")
                ->with("page", $page);
        } else {
            abort(404);
        }
    }

    public function sendContactForm(Request $request)
    {
        $rules = [
            "name" => "required",
            "email" => [
                "required",
                "email"
            ],
            "message" => "required"
        ];
        $messages = [
            "name.required" => __("contactPage.validation.name"),
            "email.required" => __("contactPage.validation.email"),
            "email.email" => __("contactPage.validation.emailFormat"),
            "message.required" => __("contactPage.validation.message"),
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return back()
                    ->withErrors($validator)
                    ->withInput();

        //captcha ellenőrzése
        $captcha = ApiController::CheckCaptcha($request->gRecaptchaResponse);
        if ( !$captcha )
            return back()
                ->withErrors(__('contactPage.validation.captcha'))
                ->withInput();

        //email küldése
        \Mail::to(env("ADMIN_EMAIL"))->send(new ContactMail($request->all()));

        //mehet vissza
        return redirect()->back()->withSuccess(__("contactPage.form.success"));
    }

    public function BlogList()
    {
        $blogs = Blog::orderBy("created_at","desc")->paginate(9);
        $tags = Tag::orderBy("name")->get();
        $breadcumbs = [];
        $breadcumbs[0]["name"] = "Főoldal";
        $breadcumbs[0]["url"] = "/";
        $breadcumbs[1]["name"] = "Blog";
        $breadcumbs[1]["url"] = route("blog");

        return view("Blog")
            ->with("blogs",$blogs)
            ->with("tags", $tags)
            ->with("breadcumbs", $breadcumbs)
            ->with("currentTag", "");
    }

    public function BlogTagFilter($tag)
    {
        $tag     = Tag::where("url", $tag)->first();
        $blogIds = Blog_tag::where("tag_id", $tag->id)->pluck("blog_id");
        $blogs   = Blog::whereIn("id", $blogIds)->orderBy("created_at")->paginate(9);
        $tags    = Tag::orderBy("name")->get();

        $breadcumbs[0]["name"] = "Főoldal";
        $breadcumbs[0]["url"] = "/";
        $breadcumbs[1]["name"] = "Blog";
        $breadcumbs[1]["url"] = route("blog");
        $breadcumbs[2]["name"] = $tag->name;
        $breadcumbs[2]["url"] = route("blogTagFilter",$tag->url);

        return view("Blog")
            ->with("blogs", $blogs)
            ->with("tags", $tags)
            ->with("breadcumbs", $breadcumbs)
            ->with("currentTag", $tag->name);
    }

    public function BlogDetail($tagUrl, $blogUrl)
    {
        $blog = Blog::where("url", $blogUrl)->first();
        $tag  = Tag::where("url",$tagUrl)->first();
        $tags = Tag::orderBy("name")->get();

        $latestBlogs = Blog::orderBy("created_at","DESC")->take(3)->get();

        $breadcumbs[0]["name"] = "Főoldal";
        $breadcumbs[0]["url"] = "/";
        $breadcumbs[1]["name"] = "Blog";
        $breadcumbs[1]["url"] = route("blog");
        $breadcumbs[2]["name"] = $tag->name;
        $breadcumbs[2]["url"] = route("blogTagFilter",$tagUrl);
        $breadcumbs[3]["name"] = $blog->name;
        $breadcumbs[3]["url"] = route("blogDetail",[$tagUrl,$blogUrl]);

        return view("BlogDetail")
            ->with("blog", $blog)
            ->with("breadcumbs", $breadcumbs)
            ->with("latestBlogs",$latestBlogs)
            ->with("tags", $tags);
    }
}
