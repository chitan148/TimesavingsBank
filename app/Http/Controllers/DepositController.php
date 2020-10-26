<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
use App\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
   public function index(UserDetail $user_detail){
        //ログインしているユーザーの$user_detailに紐づくmissionsを取得
        $missions = $user_detail->missions()->get();
        //missionの数を数える　
        $count = $missions->count();         

        //viewに渡します
        return view('deposit.index', [
            'missions' => $missions,
            'count' => $count,
            'user_detail_id' => $user_detail->id
        ]);
   }
   public function confirm(UserDetail $user_detail, Request $request){
        //viewに渡します
        $mission_ids = $request->input('mission_id');
        $mission = array();
        $missions = array();
        $var = 12;
        //$deposit_countは、ユーザーが入力したミッションの回数
        foreach($mission_ids as $mission_id => $deposit_count){
            //ミッションの情報をモデル(DB)からもらう
            $mission_info = Mission::find($mission_id);
            $time = $mission_info->time;
            
            $mission = array();
            $mission['mission_id'] = $mission_id;
            $mission['deposit_count'] = $deposit_count;
            $mission['time'] = $time;
            $mission['var'] = $var;

            array_push($missions, $mission);
            $mission = array();
        }
        
        $dump = var_dump($missions);
        return view('deposit.confirm', ['dump' => $dump]);
    }
}
