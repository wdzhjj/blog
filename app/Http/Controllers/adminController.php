<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function blog_upload(Request $request){

        return view('test');


    }

    public function WangUploadImg(Request $request){
        header('Content-type:text/json');
        $path = $request->file('img')->store(date('Y-m-d'));        //获得路径名
        if ($request->file('img')->isValid()){                      //验证是否上传成功
            echo $path;
        }

    }
}
