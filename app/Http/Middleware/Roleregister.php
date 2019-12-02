<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Roleregister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::User()->role == "register") {
            return $next($request);
        }
        else{
            return redirect("/home");
        }
    }
}
