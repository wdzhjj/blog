<?php

namespace App\Http\Middleware;

use App\Userinfo;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class permission
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
        $actions = $request->route()->getAction()['controller'];                //获取路径
        $permission = config('permission')[$actions];   //获取自定义的权限
        $admin = Session::get('admin_user');
        $infos = Userinfo::where('uid', '=', $admin)->get()->toArray();
        $gid = $infos[0]['group_id'];
        $powers = DB::table('groups_powers')
            ->leftJoin('powers','powers.pid','=','groups_powers.pid')
            ->where('gid','=',$gid)
            ->select('power')
            ->get();
        foreach ($powers as $power) {
            if($power->power == $permission){
                return $next($request);
            }
        }
        $msg = "权限不足，无法操作";
        $error = "您没有拥有｛".$permission."｝权限";
        Log::info($msg.$error);
        echo $msg;exit;
    }
}
