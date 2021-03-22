<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    //public $timestamps = false;

    const GENDERS = [ 
        1 => ['type' => '男性'], 
        2 => ['type' => '女性']
    ]; //keyに名前が欲しいので二次元連想配列にする

    public function missions(){
        return $this->hasMany('App\Mission');
    }
    public function trades(){
        return $this->hasMany('App\Trade');
    }
}
