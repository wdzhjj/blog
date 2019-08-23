<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


//use Illuminate\Database\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //解决字符 问题
       // Schema::defaultStringLength(191);
        //所有admin模板下的文件 共享 blogComposer 所有的数据
        View::composer('*', 'App\Http\ViewComposers\blogComposer');

        //bbs是否登录 登录信息传给所有页面
        View::composer('SingleDog.*','App\Http\ViewComposers\bbsComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
