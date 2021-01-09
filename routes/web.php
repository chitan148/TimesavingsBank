<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('users/{user_detail}/home', 'HomeController@index')->name('home');
//Route::get('/register/result', 'auth/RegistorController@result')->name('register.result');
Route::get('users/{user_detail}/missions/create', 'MissionController@showCreateMissionForm');
Route::post('users/{user_detail}/missions/create', 'MissionController@create')->name('missions.create');
Route::get('users/{user_detail}/deposit/index', 'DepositController@index')->name('deposit.index');
Route::post('users/{user_detail}/deposit/confirm', 'DepositController@confirm')->name('deposit.confirm');
Route::post('users/{user_detail}/deposit/result', 'DepositController@result')->name('deposit.result');
//Route::post('users/{user_detail}/deposit/confirm', 'DepositController@confirm');
Route::get('users/{user_detail}/withdraw/index', 'WithdrawController@index')->name('withdraw.index');
Route::post('users/{user_detail}/withdraw/confirm', 'WithdrawController@confirm')->name('withdraw.confirm');
Route::post('users/{user_detail}/withdraw/result', 'WithdrawController@result')->name('withdraw.result');
// Route::get('trades/index', 'TradeController@index')->name('trade.index');
Route::get('users/{user_detail}/trades/index', 'TradeController@index')->name('trade.index');
// Route::get('trades/{trades}', 'TradeController@clear')->name('trades.clear');