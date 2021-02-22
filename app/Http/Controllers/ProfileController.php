<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\User_social_media;
use App\Models\Follow;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userSlug)
    {
        $user = User::where("slug",$userSlug)
                    ->where("user_status_id", 2)
                    ->first();
        if ( !$user )
            abort(404);

        $socialMedias = User_social_media::where("user_id",$user->id)->get();

        return view('Profile.Show')
            ->with("user", $user)
            ->with("socialMedias", $socialMedias);
    }

    public function Follow(Request $request, $toUserId)
    {
        $fromUserId = $request->userId;

        if ( $fromUserId ) {
            $follow = new Follow();
            $follow->from_user_id = $fromUserId;
            $follow->to_user_id = $toUserId;
            $follow->save();

            return true;
        } else {
            return false;
        }

        return false;
    }

    public function UnFollow(Request $request, $userId)
    {
        $fromUserId = $request->userId;
        if ( $fromUserId ) {
            $follow = Follow::where("from_user_id",$fromUserId);
            $follow->delete();

            return true;
        } else {
            return false;
        }

        return false;
    }
}
