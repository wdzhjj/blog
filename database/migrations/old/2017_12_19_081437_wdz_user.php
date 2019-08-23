<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WdzUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //用户信息表 主表 user
        Schema::create('wdz_users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nick',20);
            $table->string('password');
            $table->string('email');
            $table->string('tel',11);
            $table->tinyInteger('sex');
            $table->tinyInteger('status');
            $table->tinyInteger('lock');
            $table->tinyInteger('vip');
            $table->string('reg_ip',20);
            $table->string('head');
            $table->string('message',100);
            $table->timestamps();
        });
        //用户登录表
        Schema::create('wdz_user_auth', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('login_type',20);
            $table->string('login_id',40);
            $table->string('credential',80);
        });
        //用户ip记录表
        Schema::create('wdz_user_ip', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('ip',20);
        });
        //用户收藏表
        Schema::create('wdz_user_subs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('type',10);
            $table->integer('sub_id')->index();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('wdz_users');
        Schema::dropIfExists('wdz_user_auth');
    }
}
