<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function index(){
//            $message = "周日验血;  下周日理发";
//            $title = '每周备忘';
//            $to = 'Kyrie_wu@163.com';
        /*发送单条文本信息
        Mail::raw('邮件测试', function($message){
            $message->to($to);
            $message->subject('啦啦网邮箱注册激活');
        });
        */
        /*发送视图View页面*/
//        $str = '这周末游泳+书店，周日约篮球吃饭。下周末不动，下下周末周六早上去医院预约，下午理发，晚上足浴，第二天体检，下午找两位吃饭';
//        $str = '8.29号带身份证办理工资卡';
//        $str = "9.8号周日 去口腔医院拔牙，要洗则洗，能补则补，要拔就拔，预算500。\n 先撑过10月份，再行商议";
//        $str = "明天带身份证，又要办卡";
//        $str = "周四带上笔记本和不用的物品准备回家";  //9.10
        $str = "9.16周一更新\n 本周末继续验血一次，如继续有问题 则国庆去检查肿瘤套餐\n 周一今晚去游泳，买水果 \n 周五晚游泳 周六晚上休息，周末下午继续运动\n 未来三周核心：带妈妈一起检查身体，学习一点乐理知识 \n 原定计划不变 存钱计划搁置 10月底换工作 找其他住处 1400左右";  //9.16
        Mail::send('email.test', ['name' => $str], function($message){
            $message->to('Kyrie_wu@163.com');
            $message->subject('备忘');
        });



        #发送邮件 使用 Mail facade 的 to方法 一个 user 实现或一个 users 集合
    }

}
