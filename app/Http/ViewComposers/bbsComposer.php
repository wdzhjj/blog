<?php
namespace app\Http\ViewComposers;

use App\Userinfo;
use Illuminate\Contracts\View\View;         //自带的服务
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

    class bbsComposer
    {
        /*
         * @author wdz
         * @return array
         * @date 18.10.24 15:35
         * @detail 获取types表中的分类信息,通过AppServiceProvider.php 传递给所有视图
         * */
        public function compose(View $view)
        {
            $uid = Session::get('bbs_uid');
            if($uid){
                $userinfo = Userinfo::where('uid','=',$uid)->get()->toArray();
                $view->with('bbs_userinfo', $userinfo);
            }
        }
    }