<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $table ='trades';
    public function trade_details(){
        return $this->hasMany('App\TradeDetail'); //sが間違ってるきがする
    }
    public function user_detail(){
        return $this->belongsTo('App\UserDetail');  
    }
}
