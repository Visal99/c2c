<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if($request->user() != null){
            if($request->user()->type == "front"){
                return redirect('/');
            }
            return $next($request);
        }
        return redirect('/system');
        
    }
}
