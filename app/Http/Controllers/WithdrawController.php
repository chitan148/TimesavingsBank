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
        //リクエストからコメントを取得。null(入力無し)の時は空文字を入れる。
        $comment = $request->input('comment');
        if($comment === null ){
            $comment = '';
        }
        
        //所有時間情報を計算して更新。
        //$saving_old_timeは今まで所有していた時間。
        $saving_old_time = $user_detail->saving_time;

        // 今まで所有していた時間より　出刻時間が多い時　再入力してもらう
        // メッセージを発行　出刻時間入力ページへリダイレクト
        if($withdraw_time > $saving_old_time){
            return redirect()->route('withdraw.index',['user_detail' => $user_detail->id])->with('my_status',('残高不足です'));
        } else {
            
            //今まで所有していた時間から出刻時間を引き算し　代入（更新）
            $saving_time = $saving_old_time - $withdraw_time;
            //取引タイプへwithdrawを示す2を代入
            $type = 2;

            //トランザクション開始
            DB::transaction(function () use(
                $user_detail,
                $saving_time,
                $withdraw_time,
                $comment,
                $type) 
                {
                    //計算後の所有時間を記録　user_detailsテーブルの更新処理
                    $user_detail->saving_time = $saving_time;
                    $user_detail->save();
                
                    //取引の記録をつける　tradesテーブルの新規作成処理
                    //取引量に総計、取引時点で所有時間 に 最新所有時間、コメントにコメント タイプにタイプをinsert
                    $trade = new Trade;
                    $trade->trading_time = $withdraw_time;
                    $trade->time_save_now = $saving_time;
                    $trade->comment = $comment;
                    $trade->type = $type;
                    //$user_detailsテーブルと紐づける
                    $user_detail->trades()->save($trade);
                }
            );

            //リロード対策　トークン再発行　ページ編集後コメントアウトを消す。
            // $request->session()->regenerateToken();

            return view('withdraw/result', [
                'user_name' => $user_name,
                'withdraw_time' => $withdraw_time,
                'saving_old_time' => $saving_old_time,
                'saving_time' => $saving_time,
                'comment' => $comment,
                'user_detail_id' => $user_detail->id
            ]);
        }
        
    }
}
