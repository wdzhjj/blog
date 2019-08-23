<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    //模型关联博客类别表
    protected $table = 'main_type';
    public $timestamps = false;
    protected $primaryKey = 'mid';
}
