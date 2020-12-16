<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class ApiController extends Controller
{
    public static function CheckCaptcha($token)
    {
        //check captcha
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];

        $result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".env("GCAPTCHA_SECRET_KEY")."&response=".$token."&remoteip=".$remoteip);
        $resultJson = json_decode($result);

        if( intval($resultJson->success) !== 1 ) {
            return false;
        } else {
            return true;
        }
        
        return false;
    }

    public function getEmailAddress(Request $request) {
        $rules = [
            'id' => 'required',
            'gRecaptchaResponse' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return false;
        

        //check captcha
        $check = Self::CheckCaptcha($request->gRecaptchaResponse);
        if ( $check ) {
            $user = User::findOrFail($request->id);
            return $user->email;
        } else {
            return false;
        }

        return false;
    }

    public function getPhoneNumber(Request $request) {
        $rules = [
            'id' => 'required',
            'gRecaptchaResponse' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return false;
        

        //check captcha
        $check = Self::CheckCaptcha($request->gRecaptchaResponse);
        if ( $check ) {
            $user = User::findOrFail($request->id);
            return $user->phone;
        } else {
            return false;
        }

        return false;
    }
}
