<?php

namespace App\Http\Controllers;

use App\blog;
use App\message;
use App\types;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class
IndexController extends Controller
{
    //
    public function index(){
        header('Content-type:text/html;charset=utf-8');
        //获得此用户的 置顶的 4篇文章
        $top = blog::where('user_id','=',1)->where('top','=',1)->paginate(12);
        return view('index',compact('top'));
    }

    public function detail(Request $request){
        $id = $request->id;
        $top = blog::where('user_id','=',1)->where('top','=',1)->get();
        //$data = blog::where('user_id','=',1)->where('id','=',$id)->get()->toArray();
        $model = blog::find($id);
        $data = $model->toArray();
        $type = $model->detail;
        $user = users::where('id','=','1')->get()->toArray();
        return view('detail',compact(['top','data','type','user']));
    }


    public function type(Request $request){
        header('Content-type:text/html;charset=utf-8');
        $type = $request->type;
        if(!$type){
            $data = blog::where('status','=',0)->paginate(16);
        }elseif(!is_numeric($type)){
            return view('404');
        }else{
            $data = blog::where('types_id','=',$type)->paginate(16);
        }
        return view('type',compact('data'));
    }

    public function search(Request $request){
        header('Content-type:text/html;charset=utf-8');
        $key = $request->key;
        if($request->key == '' && $request->page == ''){
            return view('404');
        }
        $data = blog::where('title','like','%'.$key.'%')
                //->orderBy('id','desc')
                ->paginate(8);
        $top = blog::where('user_id','=',1)->where('top','=',1)->get();
        return view('search',compact(['data','top','key']));
    }

    public function message(Request $request)
    {
        header('Content-type:text/html;charset=utf-8');
        $data = message::paginate(20);
        if($request->isMethod('blog')){
            $message = new message;
            $message->blog_id = $request->comment_post_id;
            $message->user_id = $request->comment_from;
            $message->ip = $_SERVER['REMOTE_ADDR'];
            $message->message = $request->comment;
            $message->save();
        }
        $res = DB::table('wdz_message')
            ->select('*','wdz_message.id as uid')
            ->leftjoin('wdz_users','wdz_message.user_id','=','wdz_users.id')
            ->where('blog_id','=',null)
            ->paginate(2);
            //->toArray();
        $reply = DB::table('wdz_reply')
            ->leftjoin('wdz_message','wdz_reply.message_id','=','wdz_message.id')
            ->leftjoin('wdz_users','wdz_reply.user_id','=','wdz_users.id')
            ->get();
        //dd($res);
        return view('message',compact(['data','res','reply']));
    }

    public function reply(Request $request)
    {
        header('Content-type:text/html;charset=utf-8');
        DB::table('wdz_reply')->insert(
            [
                'user_id'=>$request->user_id,
                'message_id'=>$request->message_id,
                'reply'=>$request->reply,
                'ip'=>$_SERVER['REMOTE_ADDR'],
                'created_at'=>time(),
                'updated_at'=>'',
            ]
        );
    }

}
