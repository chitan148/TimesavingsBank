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
        //'mission_id'のキーがついたものだけ取り出す
        $mission_ids = $request->input('mission_id');
        //各ミッションの為の配列
        $mission = array();
        //表示の際にforeachを使うための配列
        $missions = array();
        $var = 12;
        //$deposit_countは、ユーザーが入力したミッションの回数
        foreach($mission_ids as $mission_id => $deposit_count){
            //ミッションの情報をモデル(DB)からもらう
            $mission_info = Mission::find($mission_id);
            $time = $mission_info->time;
            $name = $mission_info->name;
            
            //ID 名前　回数　報酬時間　を、名前を付けて配列に入れる
            $mission['mission_id'] = $mission_id;
            $mission['name'] = $name;
            $mission['deposit_count'] = $deposit_count;
            $mission['time'] = $time;
            $mission['var'] = $var;
            //ループ用配列に入れる
            array_push($missions, $mission);
            $mission = array();
        }
        
        $dump = var_dump($missions);
        return view('deposit.confirm', ['dump' => $dump, 'missions' => $missions]);
    }
}
