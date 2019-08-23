<?php

namespace App\Admin;

use App\Blog;
use App\Types;
use App\user_auth;
use App\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    /*
     * 后台登录验证
     * */
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request,[
                'name'=>'required|min:2|max:10',
                'password'=>'required|min:6|max:12'
            ],[
                'required' => '必须存在',
                'min' => '最少字符',
                'max' => '最多字符'
            ],[
                'name'=>'用户名',
                'password'=>'密码',
            ]
                );
            $check = request(['name','password']);
            $users = user_auth::where('identity_type','=','admin')
                    ->where('identifier','=',$check['name'])
                    ->get();
            foreach ($users as $user){
                if($user->credential == SHA1($check['password'].$check['name'])){
                    Session::put('admin_user',$user->uid);
                    return view('admin/home/index');
                }else{
                    return view('admin/login/index')->withErrors('登录失败用户名或密码错误');
                }
            }
            //登录已经成功的情况
        }else{
            if(empty(Session::get('admin_user'))){
                return view('admin/login/index');
            }
            return view('admin/home/index');
        }

    }

    //退出登录
    public function logout(Request $request)
    {
        if (Session::get('admin_user')) {
            $request->session()->forget('admin_user');
            return view('/admin/login/index');
        }
    }



    //博客管理
    public function blog_list(Request $request){
        $post = Blog::paginate(20);
        return view('admin/blog/list')->with('posts',$post);
    }

    public function add(Request $request)
    {
        if($request->isMethod('get')){
            $parent_type = Types::where('lock','=','0')
                            ->where('parent_id','!=',0)
                            ->orderBy('quanzhong','asc')
                            ->get()
                            ->toArray();
            if(is_numeric($request->id)) {
                $edit = Blog::find($request->id)->toArray();
            }else{
                $edit = array();
            }
            return view('admin/blog/add')->with('edit',$edit)->with('parent_type',$parent_type);
        }

        if($request->isMethod('post')){
            if($request->input('power') == 'add'){
                $blog = new Blog;
            }elseif($request->input('power') == 'edit' && is_numeric($request->input('blogid')) ){
                $blogid = $request->input('blogid');
                $blog = Blog::find($blogid);
                $blog->id = $blogid;
                $blog->update();
            }else{
                return redirect();
            }
            //上传图片
            if ($request->hasFile('img')) {
                $path = $request->file('img')->store("//".date('Y-m-d'));        //获得路径名
                if ($request->file('img')->isValid()){                      //验证是否上传成功
                    $blog->image = $path;
                }
            }
            $blog->title = $request->input('title');
            $blog->description = $request->input('description','');
            $blog->quanzhong = $request->input('quanzhong',0);
            $blog->tag = str_replace(' ','*',$request->input('tag',''));
            $blog->top = $request->input('top',0);
            $blog->user_id = $request->input('userid',0);
            $blog->content = $request->input('content');
            $blog->tid = $request->input('typeid',13);
            $blog->save();
            return redirect('admin/blog/list');
        }
    }

    public function lock(Request $request)
    {
        $id = $request->id;
        if(is_numeric($id)){
            $blog = Blog::find($id);
            if($blog->private==0) {
                $blog->private = 1;
            }else{
                $blog->private = 0;
            }
            $blog->save();
        }
        return redirect()->back();
    }












}
