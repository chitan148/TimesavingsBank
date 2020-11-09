<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function index(UserDetail $user_detail){
        return view('withdraw/index', ['user_detail_id' => $user_detail->id]);
    }
    public function confirm(UserDetail $user_detail, Request $request){
        
        //'withdraw_time'のキーがついたものだけ取り出す
        $withdraw_time = $request->input('withdraw_time');
        //sessionに出刻時間を格納
        session(['withdraw_time' => $withdraw_time]);
        //viewに渡す
        return view('withdraw/confirm', [
            'withdraw_time' => $withdraw_time,
            'user_detail_id' => $user_detail->id
        ]);
    }

    public function result(UserDetail $user_detail, Request $request){
        //セッションから出刻時間を取得
        $withdraw_time = session('withdraw_time');
        //リクエストからコメントを取得
        $comment = $request->input('comment');
        
        //所有時間情報を計算して更新。
        //$saving_old_timeは今まで所有していた時間。
        $saving_old_time = $user_detail->saving_time;
        //総計　を足し算して　代入（更新）
        $saving_time = $saving_old_time - $withdraw_time;
        
        return view('withdraw/result', [
            'withdraw_time' => $withdraw_time,
            'saving_old_time' => $saving_old_time,
            'saving_time' => $saving_time,
            'comment' => $comment,
            'user_detail_id' => $user_detail->id
        ]);
    }
}
