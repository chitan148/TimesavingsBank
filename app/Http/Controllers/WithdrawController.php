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
        //viewに渡す
        return view('withdraw/confirm', ['withdraw_time' => $withdraw_time]);
    }
}
