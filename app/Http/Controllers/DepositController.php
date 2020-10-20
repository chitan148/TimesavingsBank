<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
use App\Mission;
use Illuminate\Http\Request;

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
            'count' => $count
        ]);
   }
}
