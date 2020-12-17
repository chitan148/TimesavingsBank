<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $table ='trades';
    public function tradeDetails(){
        return $this->hasMany('App\TradeDetails'); //sが間違ってるきがする
    }
    public function user_detail(){
        return $this->belongsTo('App\UserDetail');  
    }
}
