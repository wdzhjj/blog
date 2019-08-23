<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WdzUserForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('wdz_user_auth',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('wdz_users');
        });
        Schema::table('wdz_user_ip',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('wdz_users');
        });
        Schema::table('wdz_user_subs',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('wdz_users');
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
