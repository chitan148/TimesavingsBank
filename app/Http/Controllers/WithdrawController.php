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
}
