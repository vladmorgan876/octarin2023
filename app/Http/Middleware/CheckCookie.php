<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCookie
{
    public function handle(Request $request, Closure $next)
    {
        if(isset($_COOKIE['user'])){
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
