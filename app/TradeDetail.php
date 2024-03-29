<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradeDetail extends Model
{
    public function mission()
    {
        return $this->belongsTo('App\Mission');
    }
    
    public function trade()
    {
        return $this->belongsTo('App\Trade');
    }
}
