<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Mail\MailForPasswordReset;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function user_detail(){
        return $this->hasOne('App\UserDetail');
    }
    public function sendPasswordResetNotification($token){
        Mail::to($this)->send(new MailForPasswordReset($token));
        //Mail::to($request->user())->send(new OrderShipped($order));
        //toは送信先　userなので$thisでいい　sendはMailファサード　与えられたメーラーを使ってメッセージを送信する仕事のひと
        //Mailファサード　vendorのsrcのMailable.phpの162行目　buildFromは343行目　他のも全部あるから困ったら探して読む
    }
}
