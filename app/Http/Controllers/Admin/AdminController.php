<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\User;

class AdminController extends Controller
{
    public function Dashboard()
    {
        $totalUsers = User::all()->count();
        
        $weekstart = Carbon::now()->startOfWeek(Carbon::MONDAY)->format("Y-m-d");
        $weekend   = Carbon::now()->endOfWeek(Carbon::SUNDAY)->format("Y-m-d");
        $newUserThisWeek = User::where("created_at", ">=" , $weekstart)
                                ->where("created_at", "<=", $weekend)
                                ->count();
        

        return view('Admin.Dashboard')
            ->with("totalusers", $totalUsers)
            ->with("newUserThisWeek", $newUserThisWeek);
    }
}
