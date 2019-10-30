<?php

namespace App\Http\Middleware;

use Closure;

class test
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
        echo $request->method();
        if($request->method() == 'POST'){
            return redirect('/admin/login');
        }else{
            return $next($request);
        }
    }
}
