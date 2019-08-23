<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SystemAdminForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('system_admin_user',function(Blueprint $table){
            $table->foreign('role')->references('id')->on('system_admin_role');
        });
        Schema::table('system_admin_user_power', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('system_admin_user');
            $table->foreign('power_id')->references('id')->on('system_admin_power');
        });
        Schema::table('system_admin_role_power', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('system_admin_role');
            $table->foreign('power_id')->references('id')->on('system_admin_power');
        });
        Schema::table('system_admin_power', function(Blueprint $table){
            $table->foreign('menu')->references('id')->on('system_admin_menu');
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
    }
}
