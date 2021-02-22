<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\ApiController;
use App\Models\User;

class SearchController extends Controller
{
    public function SearchArtist(Request $request)
    {
        $searchValue = $request->search;
        $users = User::select("slug", "name", "avatar", "id")
                    ->where("name", "LIKE", "%".$searchValue."%")
                    ->where("user_role_id", 3)
                    ->get();

        return view("Artists")
            ->with("users", $users)
            ->with("search_value", $searchValue)
            ->with("search_type_data", "artist")
            ->with("search_type_value", __("pageItems.search.artist"));
    }

    public function SearchCreation(Request $request)
    {
        return view("Creations");
    }

    public function AjaxSearch(Request $request)
    {
        $type  = $request->search_type;
        $value = $request->input_value;

        if ( $type=="artist" )
        {
            return User::select(DB::raw("CONCAT('http://localhost:5100/muvesz/',slug) as url, name"))
                    ->where("name", "LIKE", "%".$value."%")
                    ->where("user_role_id", 3)
                    ->get(["url", "name"]);
        }

        if ( $type=="creation" )
        {

        }

        return false;
    }
}
