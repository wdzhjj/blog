<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $primaryKey='id';
    protected $table = 'blog';
    public function type(){
        return $this->hasOne('App\Types','mid','tid');
    }
    public function author(){
        return $this->hasOne('App\userinfo','uid','user_id');
    }
}
