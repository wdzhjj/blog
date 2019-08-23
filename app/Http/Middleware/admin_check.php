<?php

namespace App\Http\Middleware;

use App\Userinfo;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class admin_check
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
        if(empty($admin = Session::get('admin_user'))){
            return response()->view('admin/login/index');
        }else{
            $user = Userinfo::find($admin)->toArray();
            if(!$user['lock'] == 0){
                return response()->view('admin/login/index');
            }
        }
        return $next($request);
    }
}
