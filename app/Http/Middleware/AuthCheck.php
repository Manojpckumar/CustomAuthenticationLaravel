<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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

        // if session does not contain user value then go to login while trying to direct access to dashboard
        if(!session()->has('LoggedUser') && ($request->path() !='auth/login' && $request->path() !='auth/register'))
        {
            return redirect('auth/login')->with('fail','Login again');
        }


        if(session()->has('LoggedUser') && ($request->path() =='auth/login' || $request->path() =='auth/register'))
        {
            return back();
        }


        return $next($request)->header('Cache-Control','no-cache,no-store,max-age=0,must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');

    }
}
