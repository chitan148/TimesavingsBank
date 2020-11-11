<?php

namespace App\Http\Controllers;

use App\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TradeController extends Controller
{
    public function index(){
        //$trades = DB::table('trades')->get();
        $trades = Trade::get();
        $var = var_dump($trades);
        return view('trades/index', ['var' => $var]);
        //return view('trades/index', ['trades' => $trades]);
    }
}
