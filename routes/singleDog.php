<?php

Route::group(['prefix' => 'SingleDog'],function(){
    Route::get('index',"\App\SingleDog\IndexController@index");         //首页
    Route::any('login',"\App\SingleDog\IndexController@login");         //登录
    Route::get('logout',"\App\SingleDog\IndexController@logout");       //登出
    Route::any('logon',"\App\SingleDog\IndexController@logon");         //注册
});
