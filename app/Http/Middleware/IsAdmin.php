<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;


class IsAdmin
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
        if ( Auth::check() && Auth::user()->has_user_role('Admin') )
        {
            return $next($request);
        }

        return redirect('/');
    }
}
