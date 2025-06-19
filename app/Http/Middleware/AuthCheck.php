<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthCheck
{

    public function handle(Request $request, Closure $next)
    {
       if(!Session::has('user_id')){
        return redirect()->route('showLoginForm')->with('error', 'You are not logged in');
       }

        return $next($request);
    }
}
