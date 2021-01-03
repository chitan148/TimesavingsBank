<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
use App\Mission;
use App\Trade;
use App\TradeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
   public function index(UserDetail $user_detail){
        //ログインしているユーザーの$user_detailに紐づくmissionsを取得
        $missions = $user_detail->missions()->get();
        //missionの数を数える　
        $count = $missions->count();//mission未作成の場合はint型の0が入っている。
        
        //未作成の場合はミッション作成画面にリダイレクト
        if($count === 0){
            return redirect()->route('missions.create',['user_detail' => $user_detail->id]);
        
        } else {

            return view('deposit.index', [
                'missions' => $missions,
                'count' => $count,
                'user_detail_id' => $user_detail->id,
            ]);
        }
   }
   public function confirm(UserDetail $user_detail, Request $request){
        //'mission_id'のキーがついたものだけ取り出す
        $mission_ids = $request->input('mission_id');
        //各ミッション毎のデータをパックする配列
        $mission = array();
        //表示の際にforeachを使うための配列
        $missions = array();
        
        //小計と総計の為の変数
        $subtotal = 0;
        $gland_total = 0;
        
        //$var = 12;
        //$deposit_countは、ユーザーが入力したミッションの回数
        foreach($mission_ids as $mission_id => $deposit_count){
            if(ctype_digit($deposit_count) === true){
                //ミッションの情報をモデル(DB)からもらう
                $mission_info = Mission::find($mission_id);
                $time = $mission_info->time;
                $name = $mission_info->name;
                
                //小計　総計　を計算
                $subtotal = $time * $deposit_count;
                $gland_total += $subtotal;
                
                //ID 名前　回数　報酬時間　を、名前を付けて配列に入れる
                $mission['mission_id'] = $mission_id;
                $mission['name'] = $name;
                $mission['deposit_count'] = $deposit_count;
                $mission['time'] = $time;
                $mission['subtotal'] = $subtotal;
                //$mission['var'] = $var;
                //ループ用配列に入れる
                array_push($missions, $mission);

                //データパックの配列と小計を初期化
                $mission = array();
                $subtotal = 0;
            }
        }
        //$dump = var_dump($missions);
        //sessionに総計とデータパック配列を格納
        session(['gland_total' => $gland_total]);
        session(['missions' => $missions]);
        //viewに総計・データパック配列・formタグのためのユーザー詳細IDを渡す
        return view('deposit.confirm', ['missions' => $missions, 'gland_total' => $gland_total, 'user_detail_id' => $user_detail->id]);
    }
    
    public function result(UserDetail $user_detail, Request $request){
        //とりあえず名前
        $user_name = $user_detail->name;
        //セッションから総計とデータパック配列を取得
        $gland_total = session('gland_total');
        $datas = session('missions');
        
        //最新の所有時間情報を作る。
        //$saving_old_timeは今まで所有していた時間。
        $saving_old_time = $user_detail->saving_time;
        //総計　を足し算して　代入（更新）
        $saving_time = $saving_old_time + $gland_total;
        
        //コメントもとってきてみる
        $comment = $request->input('comment');

        //取引タイプへdepositを示す1を代入
        $type = 1;

        //トランザクション開始
        DB::transaction(function () use(
            $user_detail,
            $saving_time,
            $gland_total,
            $comment,
            $type,
            $datas) 
            {
                //計算後の所有時間を記録　user_detailsテーブルの更新処理
                $user_detail->saving_time = $saving_time;
                $user_detail->save();
        
                //取引の記録をつける　tradesテーブルの新規作成処理
                //取引量に総計、取引時点で所有時間 に 最新所有時間、コメントにコメント、タイプにタイプをinsert
                $trade = new Trade;
                $trade->trading_time = $gland_total;
                $trade->time_save_now = $saving_time;
                $trade->comment = $comment;
                $trade->type = $type;
                //$user_detailsテーブルと紐づける
                $user_detail->trades()->save($trade);

                //trade_detailsの処理
                foreach($datas as $data){
                    $detail = new TradeDetail;
                    $detail->mission_id = $data['mission_id'];
                    //$mission = Mission::find($data['mission_id']);
                    //$test = $mission['deposit_count'];
                    //$test = var_dump($test);
                    $detail->mission_count = $data['deposit_count'];
                    $detail->trade_id = $trade->id;
                    $detail->save();
                    //$mission->tradeDetails()->save($detail);    
                }
            }
        );

        //リロード対策　トークン再発行　ページ編集後コメントアウトを消す。
        // $request->session()->regenerateToken();
        
        return view('deposit.result', [
            'user_name' => $user_name,
            'gland_total' => $gland_total,
            'saving_time_old' => $saving_old_time,
            'saving_time' => $saving_time,
            'comment' => $comment,
        //    'test' => $test
        ]);
    }
}
