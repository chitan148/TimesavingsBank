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
        // $trades = $user_detail->trades->trading_time; ←これができないせいで
        $trades = Trade::where( 'user_detail_id', $user_detail->id)->where('type', '1')->get();//type1のみ抽出
        // $trades = $user_detail->trades()->get(); これでもできるかもしれないのであとで実験
        
        $trade_details_datas = array();
        foreach($trades as $trade){
            //ここで$trade->idが取れているはず。
            $trade_details = TradeDetail::where('trade_id', $trade->id)->get();
            array_push($trade_details_datas, $trade_details);
        }
        
        return view('trades/index', [
            'trades' => $trades,
            'trade_details_datas' => $trade_details_datas,
            'user_name' => $user_detail->name,
            'user_gender' => $user_detail->gender
        ]);
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
            'missions' => $missions,
        ]);
    }
}
