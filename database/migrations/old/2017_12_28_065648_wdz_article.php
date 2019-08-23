<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WdzArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //主列表
        Schema::create('wdz_main_type', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('main',30);
            $table->string('url',50);
            $table->unsignedInteger('quanzhong')->default(0);
        });
        //
        Schema::create('wdz_types', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('type',30);
            $table->string('url',50);
            $table->unsignedInteger('main_id')->index();
            $table->unsignedInteger('quanzhong')->default(0);
        });
        //
        Schema::create('wdz_blog', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('types_id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->string('title',50);
            $table->string('description',50);
            $table->text('content');
            $table->string('img',50)->default('');
            $table->string('url',80)->default('');
            $table->unsignedInteger('quanzhong')->default(0);
            $table->unsignedInteger('hits')->default(0);
            $table->unsignedTinyInteger('top')->default(0);
            $table->unsignedTinyInteger('status')->default(0);
            $table->timestamps();
        });
        Schema::create('wdz_album', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->string('name',30);
            $table->string('description',50);
            $table->string('cover',50)->default(0);
            $table->unsignedTinyInteger('top')->default(0);
            $table->string('date',20);
            $table->string('tag',50);
        });
        Schema::create('wdz_photo', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('alobum_id')->index();
            $table->string('name',50);
            $table->string('date',20);
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
