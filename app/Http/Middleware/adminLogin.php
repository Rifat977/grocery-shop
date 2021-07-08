<?php

namespace App\Http\Middleware;

use Closure;

class adminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
       @return \App\user
     */
    public function handle($request, Closure $next)
    {
        
        if(session()->has('user')){
            return $next($request);
        }else{
            return redirect()->back();
        }
    }
}
