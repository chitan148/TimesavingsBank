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

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/register/result', 'auth/RegistorController@result')->name('register.result');
Route::get('users/{user_detail}/missions/create', 'MissionController@showCreateMissionForm');
Route::post('users/{user_detail}/missions/create', 'MissionController@create')->name('missions.create');
Route::get('users/{user_detail}/deposit/index', 'DepositController@index');
Route::post('users/{user_detail}/deposit/confirm', 'DepositController@confirm')->name('deposit.confirm');
//Route::post('users/{user_detail}/deposit/confirm', 'DepositController@confirm');