<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
include_once("admin.php");
include_once("singleDog.php");
//开启route auth
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','BlogController@index');
Route::get('/movie','BlogController@movie');
Route::get('/study','BlogController@study');
Route::get('/images','BlogController@images');
Route::get('/video','BlogController@video');
Route::get('/database','BlogController@database');
Route::get('/linux','BlogController@linux');
Route::get('/php','BlogController@php');
Route::get('/life','BlogController@life');
Route::get('/music','BlogController@music');
Route::get('/think','BlogController@think');
//搜索
Route::post('/search','BlogController@search');
//评论
Route::post('/comment','BlogController@comment');

Route::any('/message','IndexController@message');
Route::post('/reply','IndexController@reply');

//详情页
Route::get('/detail/{id}','BlogController@detail')
    ->where('id','[0-9]+');
//详情页
Route::get('/detail/id/{id}','BlogController@detail')
    ->where('id','[0-9]+');

//富文本图片上传
Route::any('/Upload','adminController@blog_upload');
Route::any('/WangUploadImg','adminController@WangUploadImg');

//发送邮件
Route::get('/Mail','MailController@index');