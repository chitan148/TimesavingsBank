<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
use App\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        //トランザクション開始
        DB::transaction(function () use(
            $user_detail,
            $saving_time,
            $withdraw_time,
            $comment) 
            {
                //計算後の所有時間を記録　user_detailsテーブルの更新処理
                $user_detail->saving_time = $saving_time;
                $user_detail->save();
        
                //取引の記録をつける　tradesテーブルの新規作成処理
                //取引量に総計、取引時点で所有時間 に 最新所有時間、コメントにコメントをinsert
                $trade = new Trade;
                $trade->trading_time = $withdraw_time;
                $trade->time_save_now = $saving_time;
                $trade->comment = $comment;
                //$user_detailsテーブルと紐づける
                $user_detail->trades()->save($trade);
            }
        );
        
        return view('withdraw/result', [
            'withdraw_time' => $withdraw_time,
            'saving_old_time' => $saving_old_time,
            'saving_time' => $saving_time,
            'comment' => $comment,
            'user_detail_id' => $user_detail->id
        ]);
    }
}
