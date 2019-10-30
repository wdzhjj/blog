<?php
Route::group(['prefix' => 'admin'],function(){
    Route::any('/login','\App\Admin\AdminController@login');
    Route::get('/logout','\App\Admin\AdminController@logout');
    //验证后台是否登录

    //admin_check 验证是否已经登录  通过session来验证
    //permission 验证用户是否具有操作权限   通过session  admin_user_id 来验证
    Route::group(['middleware' => ['admin_check','permission']], function(){
        Route::get('/test','\App\Admin\AdminController@test');
        Route::get('/blog/list','\App\Admin\AdminController@blog_list');
        Route::any('/blog/add','\App\Admin\AdminController@add');
        Route::any('/blog/add/id/{id}','\App\Admin\AdminController@add');
        Route::get('/blog/edit/id/{id}','\App\Admin\AdminController@edit');
        Route::get('/blog/lock/id/{id}','\App\Admin\AdminController@lock');

        Route::get('/users/list','\App\Admin\UserController@index');
        Route::get('/users/lock/id/{id}','\App\Admin\UserController@lock');
    });
});