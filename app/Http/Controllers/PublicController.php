<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Page;
use App\Mail\ContactMail;

class PublicController extends Controller
{
    public function Home()
    {
        $page = Page::find("1");
        return view("welcome")
            ->with("page", $page);
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
}
