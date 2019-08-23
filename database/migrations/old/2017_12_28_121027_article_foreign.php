<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
//        Schema::table('wdz_types',function(Blueprint $table){
//            $table->foreign('main_id')->references('id')->on('wdz_main_type');
//        });
//        Schema::table('wdz_blog',function(Blueprint $table){
//            $table->foreign('types_id')->references('id')->on('wdz_types');
//            $table->foreign('user_id')->references('id')->on('wdz_users');
//        });
//        Schema::table('wdz_album',function(Blueprint $table){
//            $table->foreign('user_id')->references('id')->on('wdz_users');
//        });
//        Schema::table('wdz_photo',function(Blueprint $table){
//            $table->foreign('album_id')->references('id')->on('wdz_users');
//        });
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
