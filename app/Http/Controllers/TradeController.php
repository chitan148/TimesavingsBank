<?php

namespace App\Http\Controllers;

use App\Trade;
use App\TradeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TradeController extends Controller
{
    public function index(){
        $trades = Trade::get();
        return view('trades/index', ['trades' => $trades]);
    }
    
    //$trades_id はviewのaタグから送られてきた、tradesテーブルのidカラムの中身。
    public function clear($trades_id){
        $trade_details = TradeDetail::find($trades_id);
        $var = var_dump($trade_details);
        return view('trades/clear', ['var' => $var]);
        //return view('trades/clear', ['trades_id' => $trades_id]);
    }
}
