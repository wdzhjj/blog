<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
//    protected $primaryKey='id';
    protected $table='comments';
    public $timestamps = false;
    protected $dateFormat = 'U';
    public function res(){
        return $this->belongsToMany("App\userinfo","test","uid","userid");
    }
}
