<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ( !Auth::check() )
            return redirect(route("login"));

        $user = Auth::user();
        if ( $user->user_role_id!="4" || $user->user_status_id!="2" )
            return redirect(route("login"));
        
        return $next($request);
    }
}
