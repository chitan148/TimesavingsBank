<?php

namespace App\Http\Controllers;

use App\Trade;
use App\TradeDetail;
use App\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TradeController extends Controller
{
    public function index(){
        $trades = Trade::get();
        return view('trades/index', ['trades' => $trades]);
    }
    
    //$trade_id はviewのaタグから送られてきた、tradesテーブルのidカラムの中身。
    public function clear($trade_id){
        $trade_detail = TradeDetail::find($trade_id);
        //$var = var_dump($trade_details);
        //return view('trades/clear', ['var' => $var]);

        //選ばれたtrade_detailに紐づくmissionを取得 →　これ出来なかった　Call to undefined method App\TradeDetail::missions()
        //$mission = $trade_detail->missions()->get();
        
        $mission = Mission::find($trade_detail->mission_id);
        $var = var_dump($mission);
        return view('trades/clear', ['trade_detail' => $trade_detail, 'var' => $var]);
    }
}
