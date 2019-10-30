<?php

namespace App\Http\Controllers;

use App\Blog;
use App\comments;
use App\Types;
use App\user_auth;
use App\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class authorBlogController extends Controller
{
    //用来查看最近一次调试的sql语句
    //DB::listen(function($sql, $bindings, $time) {
    //     echo 'SQL语句执行：'.$sql.'，参数：'.json_encode($bindings).',耗时：'.$time.'ms';
    //});

    public function index()
    {
        //获取置顶的文章
        $top = Blog::where('private','!=','1')
            ->leftjoin('main_type','mid','=','tid')
            ->orderBy('top','desc')->orderBy('blog.quanzhong','desc')->take(4)
            ->get(['id','tag','title','url','content','created_at','type_name','image']);
        //获取首页列表文章
        $lines = Blog::where('private','!=','1')
            ->leftjoin('main_type','mid','=','tid')
            ->orderBy('top','desc')->orderBy('blog.quanzhong','desc')->skip(4)->take(16)
            ->get(['id','tag','title','url','content','created_at','type_name','image']);
        $new = Blog::where('private','!=','1')
                ->orderBy('id','desc')->take(5)
                ->get(['id','tag','title','created_at']);
        return view('index',compact('top','lines','new'));
    }


    //电影世界
    public function movie(){
        $data = Blog::where('private','=','0')
            ->where('tid','=','13')
            ->paginate(16);
        $types = Types::find(13);
        $type = $types->type_name;
        $msg = '电影无法延长生命，却可以减缓时间的流逝';
        return view('type',compact('data','type','msg'));
    }

    //博客主页
    public function study(){
        $data = Blog::where('private','=','0')
            ->whereIn('tid',['5','6','7'])
            ->paginate(16);
        $types = Types::find(2);
        $type = $types->type_name;
        $msg = '先为生存而学，后为孤独的人生而学';
        return view('type',compact('data','type','msg'));
    }
    //数据库
    public function database(){
        $data = Blog::where('private','=','0')
            ->where('tid','=','5')
            ->paginate(16);
        $types = Types::find(5);
        $type = $types->type_name;
        $msg = '回忆就是数据库,珍贵的内容是最大价值';
        return view('type',compact('data','type','msg'));
    }
    //linux
    public function linux(){
        $data = Blog::where('private','=','0')
            ->where('tid','=','6')
            ->paginate(16);
        $types = Types::find(6);
        $type = $types->type_name;
        $msg = '克服畏惧的事物会让人强大';
        return view('type',compact('data','type','msg'));
    }
    //php
    public function php(){
        $data = Blog::where('private','=','0')
            ->where('tid','=','7')
            ->paginate(16);
        $types = Types::find(7);
        $type = $types->type_name;
        $msg = '或许拍黄片才是我的本意';
        return view('type',compact('data','type','msg'));
    }
    //生活主页
    public function life(){
        $data = Blog::where('private','=','0')
            ->where('tid','=','8')
            ->paginate(16);
        $types = Types::find(8);
        $type = $types->type_name;
        $msg = '一花一世界，一叶一菩提';
        return view('type',compact('data','type','msg'));
    }
    //音乐
    public function music(){
        $data = Blog::where('private','=','0')
            ->where('tid','=','10')
            ->paginate(16);
        $types = Types::find(10);
        $type = $types->type_name;
        $msg = '耳朵的意义';
        return view('type',compact('data','type','msg'));
    }
    //人生感悟
    public function think(){
        $data = Blog::where('private','=','0')
            ->where('tid','=','11')
            ->paginate(16);
        $types = Types::find(11);
        $type = $types->type_name;
        $msg = '每页都是我的本意';
        return view('type',compact('data','type','msg'));
    }

    //详情页
    public function detail(Request $request){
        Session::put('userid',1);
        $data = Blog::find($request->id);
		// $data = Blog::where("private","!=","1")->where("id","=",$request->id)->get();
        // if(!$data){
			// return view(404);
			// exit;
		// }
        $type = $data->type;
        $author = $data->author['nickname'];
        $top = blog::where('user_id','=',1)->where('top','=',1)->get();
        $user = Userinfo::where('uid','=','1')->get()->toArray();
        //获取回复信息
        $comments = comments::where("content_id","=",$request->id)
            ->leftJoin("user_info",'uid','=','id')
            ->get(['id','user_id','comment','date','parent_id','ip','nickname','head'])->toArray();
        $comment_num = count($comments);
        return view('detail',compact('data','type','author','top','user','comments','comment_num'));
    }

    //视频
    public function video(){

        return view('video');
    }
    //图片
    public function images(){
        return view('images');
    }

    public function test(Request $request){
        var_dump($_FILES);
        return view('test');
    }

    //搜索
    public function search(Request $request){
        header('Content-type:text/html;charset=utf-8');
        $key = $request->key;
        if($request->key == '' && $request->page == '') {
            return view('404');
        }
        $data = Blog::where('title','like','%'.$key.'%')
            ->orWhere('tag','like','%'.$key.'%')
            ->where('private','!=','1')
            ->orderBy('quanzhong','desc')
            ->paginate(12);
//        $top = blog::where('user_id','=',1)->where('top','=',1)->get();
        return view('search',compact(['data','key']));
    }





    //评论部分 ajax
    public function comment(Request $request){
//        $this->validate($request,[
//            'comment_post_ID'=>'required|integer',
//            'comment'=>'required',
//            'comment_parent'=>'present',          //必须存在但可以是空
//            'userid'=>'present'
//        ],[
//                'required' => '必须存在',
//                'integer' => '信息不对',
//                'present' => '必须有'
//            ],[
//                'comment'=>'评论内容',
//                'comment_post_ID'=>'文章id',
//            ]
//        );
        //从ajax中收到的信息
        $comment = $request->comment;                       //评论的内容
        $content_id = $request->comment_post_ID;            //文章的id
        $parent_id  = $request->comment_parent?$request->comment_parent:0;      //@其他人的id
        $userid = $request->userid?$request->userid:0;      //用户id     没有则为匿名

        if(!$comment || !is_numeric($content_id) || !is_numeric($parent_id) || !is_numeric($userid)){          //评论和id不能为空
            $data['error'] = 1;
            $data['msg'] = '关键信息不合法';
            echo json_encode($data);
            exit;
        }
        if(mb_strlen($comment,'utf8')>500){
            $data['msg'] = '输入回复过长，不能大于500字';
            $data['error'] = 1;
            echo json_encode($data);
            exit;
        }
        $date = date("Y-m-d H:i:s");                        //评论时间
//        $date = time();
        $ip = $_SERVER['REMOTE_ADDR'];                      //提交者的ip
        $lock = 0;                                          //直接显示评论

        $comments = new comments();
        $comments->comment = $comment;
        $comments->user_id = $userid;
        $comments->date = $date;
        $comments->content_id = $content_id;
        $comments->parent_id = $parent_id;
        $comments->ip = $ip;
        $comments->lock = $lock;
        $res = $comments->save();
        if($res){
            $data['error'] = 0;
        }else{
            $data['error'] = 1;
            $data['msg'] = '信息有误，无法回复';
        }
        $data = json_encode($data);
        echo $data;
    }













}
