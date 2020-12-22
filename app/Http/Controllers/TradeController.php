<?php

namespace App\Http\Controllers;

use App\Trade;
use App\TradeDetail;
use App\Mission;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TradeController extends Controller
{
    public function index(UserDetail $user_detail){
        // $user_detailに紐づくtradesテーブルの中身をget
        $trades = $user_detail->trades()->get();
        // $user_detailに紐づくtrade_detailsテーブルの中身をget
        $trade_details = $user_detail->trades()->trade_details()->get();
        return view('trades/index', ['trades' => $trades, 'trade_details' => $trade_details]);
    }
    
    //$trade_id はviewのaタグから送られてきた、tradesテーブルのidカラムの中身。
    public function clear($trade_id){
        $trade_details = TradeDetail::where( 'trade_id', $trade_id)->get();
        //選ばれたtrade_detailに紐づくmissionを取得
        $missions = array();
        foreach($trade_details as $trade_detail){
            array_push($missions, ['mission_name' => $trade_detail->mission->name, 'mission_count' => $trade_detail->mission_count]);
            //$var = var_dump($mission_data);
        }
        // $var = var_dump($missions);
        return view('trades/clear', [
            // 'var' => $var, 
            'missions' => $missions
        ]);
    }
}
