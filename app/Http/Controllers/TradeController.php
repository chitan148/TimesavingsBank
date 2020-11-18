<?php

namespace App\Http\Controllers;

use App\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TradeController extends Controller
{
    public function index(){
        $trades = Trade::get();
        //$comments = array();
        /*foreach($trades as $trade){
            $comment = $trade->comment;
            array_push($comments, $comment);
        }
        //$var = var_dump($comments);
        //return view('trades/index', ['var' => $var]);
        */
        return view('trades/index', ['trades' => $trades]);
    }
    
    public function clear($trade){
        $var = var_dump($trade);
        return view('trades/clear', ['var' => $var]);
    }
}
