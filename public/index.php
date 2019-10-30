<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../bootstrap/autoload.php';
/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/


$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

//调用容器的 make 方法  获得了 http 处理器 ( $kernel )
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);   //容器解析 kernel对象 初始化

$response = $kernel->handle(
    //先用 Illuminate\Http\Request::capture() 抓出一个 Illuminate\Http\Request HTTP请求对象
    //作用是 HTTP请求过来的参数 按照 k=》value 格式生成Symfony\Component\HttpFoundation\ParameterBag 对象。
    //然后将包含 ParameterBag 的 $request 对象交给 Illuminate\Http\Request::createFromBase()
    $request = Illuminate\Http\Request::capture()           // 捕获请求
);

//调用 Illuminate\Http\Response 的 send 方法，将响应的状态码/头/内容返回给客户端(浏览器)，
$response->send();                                          //发送请求

$kernel->terminate($request, $response);                    //kernel终止




