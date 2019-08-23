<?php
namespace app\Http\ViewComposers;

use App\Types;
use Illuminate\Contracts\View\View;         //自带的服务
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Userinfo;

    class blogComposer
    {
        /*
         * @author wdz
         * @return array
         * @date 18.10.24 15:35
         * @detail 获取types表中的分类信息,通过AppServiceProvider.php 传递给所有视图
         * */
        public function compose(View $view)
        {
            $data = Types::where('lock','=','0')->orderBy('quanzhong','desc')->get();               //blog 列表
            $data = $data->toArray();
            $res = get_main_type($data);
            $system = Types::where('lock','=','1')->orderBy('quanzhong','asc')->get()->toArray();       //后台列表
            $menu = get_main_type($system);

            //管理员信息
            $admin = Session::get('admin_user');
            if($admin){
                $infos = Userinfo::where('uid', '=', $admin)->get()->toArray();
                $info = $infos[0]['nickname'];
                $groupid = $infos[0]['group_id'];
                $powers = DB::table('groups_powers')
                    ->leftJoin('powers','powers.pid','=','groups_powers.pid')
                    ->where('gid','=',$groupid)
                    ->get();
            }else{
                $info = '';
                $powers = '';
            }
                $view->with('types', $res)->with('menu',$menu)->with('info',$info)->with('power',$powers);

        }
    }