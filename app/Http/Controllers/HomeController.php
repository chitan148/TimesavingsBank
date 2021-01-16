<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//Authを使う

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // public function index()
    // {
    //     return view('home');
    // } 
    public function index()
    {
        if (Auth::check()) {
            //ログインできていたら、ログインユーザーを取得して、リンクに使うuser_detailsテーブルのidをviewに渡す
            $user = Auth::user();
            return view('home', ['user_detail_id' => $user->user_detail->id,]);
       
        } else {
            //出来ていなかったら、ログイン画面を表示
            return view('auth.login');
        }
        
           
    }
}
