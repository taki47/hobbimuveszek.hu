<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function Home()
    {
        return view("welcome");
    }

    public static function CheckCaptcha(Request $request)
    {
        //check captcha
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data = [
                'secret' => env("GCAPTCHA_SECRET_KEY"),
                'response' => $request->get('gRecaptchaResponse'),
                'remoteip' => $remoteip
            ];
        $options = [
                'http' => [
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data)
                ]
            ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);

        if ($resultJson->success != true) {
            return false;
        }
        if ($resultJson->score >= 0.3) {
            return true;
        } else {
            return false;
        }

        return false;
    }
}
