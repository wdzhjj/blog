<?php
namespace App\SingleDog;
use App\Admin\Controller;
use App\user_auth;
use App\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller {
    public function index()
    {
        return view('SingleDog/Index/index');
    }

    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $uname = $request -> get('uname');
            $pwd =   $request -> get('pwd');
            $type =  $request->get('type');
            $res = DB::table('user_auth')
                    ->where('identifier','=',$uname)->where('identity_type','=','bbs')
                    ->get();
            if( $res[0]->credential == SHA1($pwd.$uname) ){
                //验证成功  给予session
                Session::put('bbs_uid',$res[0]->uid);
            }else{
                return view('SingleDog/Index/login')->with('msg','登录失败');
            }
        }
        return view('SingleDog/Index/login');
//        var_dump(Session::get('bbs_uid'));

    }

    public function logout()
    {
        if( Session::get('bbs_uid') ){
            Session::forget('bbs_uid');
        }
        return view('SingleDog/Index/index');
    }

    public function logon(Request $request)
    {
        if($request->isMethod('post')){
            //1、验证码逻辑   暂无


            //2、验证数据逻辑
            $uname = $request->get('uname');
            $pwd = $request->get('pwd');
            $repwd = $request->get('repwd');

            $this->validate($request,
                [
                    'uname' => 'required|min:3|max:20',
                    'pwd' => 'required|min:6|max:12',
                    'repwd' => 'required|min:6|max:12',
                ]
            );

            if(!$uname || !$pwd || !$repwd)
            {
                echo "信息不全，无法注册";
                exit;
            }elseif ($pwd != $repwd){
                echo "两次密码不一致";
                exit;
            }
            $exist = user_auth::where('identifier','=',$uname)->get()->toArray();
            if($exist){
                echo "用户名已存在";
                exit;
            }
            //3、注册逻辑
            DB::beginTransaction();
                $user = [
                    'group_id'=>0,
                    'nickname'=>'匿名'.time(),
                    'register_ip' => getUserIpAddr(),
                    'created_at' => date("Y-m-d H:i:s"),
                ];
                $uid = Userinfo::insertGetId($user);
                if($uid){
                    $user_auth = [
                        'uid' => $uid,
                        'identity_type' => 'bbs',
                        'identifier' => $uname,
                        'credential' => SHA1($pwd.$uname),
                    ];
                    $res = user_auth::insert($user_auth);
                    if($res){
                      DB::commit();
                    }else{
                        DB::rollBack();
                    }
                }else{
                    DB::rollBack();
                }
        }
        return view('SingleDog/Index/logon');
    }
}