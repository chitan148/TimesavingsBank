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
        $trade_details = TradeDetail::where( 'trade_id', $trade_id)->get();
        //選ばれたtrade_detailに紐づくmissionを取得
        $missions = array();
        foreach($trade_details as $trade_detail){
            $mission_data = $trade_detail->mission()->get();
            foreach($mission_data as $mission){
                array_push($missions, $mission);
                $var = var_dump($mission);
            }
        }
        //$var = var_dump($mission);
        return view('trades/clear', ['var' => $var, 'missions' => $missions]);
    }
}
