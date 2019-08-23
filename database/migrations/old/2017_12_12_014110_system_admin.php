<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SystemAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //后台管理员用户表 user
        Schema::create('system_admin_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name',30);
            $table->string('nick',30)->default('');
            $table->string('password');
            $table->string('email')->default('');
            $table->string('tel',11);
            $table->timestamps();
            $table->string('role',11);
            $table->index('role');
        });
        //后台角色表  role   管理员 模块管理 操作员
        Schema::create('system_admin_role', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('role');
        });

        //后台权限表  power
        Schema::create('system_admin_power', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('power',30);
            $table->string('quanzhong',10)->default(0);  //权重值
            $table->tinyInteger('s');
            $table->string('url');
            $table->string('menu',30);
            $table->index('menu');
        });
        //列表 menu
        Schema::create('system_admin_menu', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('url');
            $table->string('name',30);
            $table->string('Ename',30)->default('');
            $table->string('quanzhong',10)->default(0);
        });

        //user_power
        Schema::create('system_admin_user_power', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('user_id',11);
            $table->string('power_id',11);
            $table->index(['user_id','power_id']);
        });
        //role_power
        Schema::create('system_admin_role_power', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('role_id',11);
            $table->string('power_id',11);
            $table->index(['role_id','power_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
*/
public function down()
{
    Schema::dropIfExists(['system_admin_user','system_admin_role','system_admin_power','system_admin_user_power','system_admin_role_power']);
//        Schema::dropIfExists('system_admin_role');
//        Schema::dropIfExists('system_admin_power');
//        Schema::dropIfExists('system_admin_user_role');
//        Schema::dropIfExists('system_admin_role_power');
}
}
