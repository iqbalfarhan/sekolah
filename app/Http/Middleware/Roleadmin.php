<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Roleadmin
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
        if (Auth::User()->role == "admin" || Auth::User()->role == "ppdb") {
            return $next($request);
        }
        else{
            return redirect('/ppdb');
        }
    }
}
