<?php

namespace App\Http\Middleware;

use Closure;

class IsActive
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
        if(auth()->check()){
            if(auth()->user()->getRawOriginal('active') != 1){
                return redirect('/verification-pending');
            }
        }
        return $next($request);
    }
}
