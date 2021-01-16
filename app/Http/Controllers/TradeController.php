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

        return view('trades/index', [
            'user_detail' => $user_detail
        ]);
    }
}
