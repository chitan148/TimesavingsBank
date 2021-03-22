<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserDetail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUser;//フォームリクエスト
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, CreateUser;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME; 98行目と処理かぶるのでコメントアウト

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register(CreateUser $request)
    {
    //$this->validator($request->all())->validate();

    event(new Registered($user = $this->create($request->all())));

    $this->guard()->login($user);

    return $this->registered($request, $user)
                    ?: redirect($this->redirectPath());
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ],[],[
    //         'name' => 'お名前',
    //         'email' => 'メールアドレス',
    //         'password' => 'パスワード',
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     //トランザクションを貼る
    //     return DB::transaction(function () use($data) { //use($data) 変数$dataを関数の中で使えるようにする
    //         //usersテーブルへのinsert
    //         $user = User::create([
    //             //'name' => $data['name'],
    //             'email' => $data['email'],
    //             'password' => Hash::make($data['password']),
    //         ]);
    //         //user_detailテーブルへのinsert
    //         $detail = new UserDetail;
    //         $detail->user_id = $user->id;
    //         $detail->name = $data['name'];
    //         $detail->gender = $data['gender'];
    //         $detail->saving_time = 0;
    //         $detail->save();

    //         return $user;
    //     }); 
    // }
    protected function create(CreateUser $request)
    {
        //トランザクションを貼る
        return DB::transaction(function () use($request) { //use($data) 変数$dataを関数の中で使えるようにする
            //usersテーブルへのinsert
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            //user_detailテーブルへのinsert
            $detail = new UserDetail;
            $detail->user_id = $user->id;
            $detail->name = $request->name;
            $detail->gender = $request->gender;
            $detail->saving_time = 0;
            $detail->save();

            return $user;
        }); 
    }
    /*public function result(){
        $user_details = Auth::user()->userDetails()->get();
        $gender = $user_details->gender;

        return view('auth/register_result', ['gender' => $gender,]);
    }
    */
    protected function registered(Request $request, $user)
    {
        // 登録したらメッセージを表示
        return redirect()->route('home', ['user_detail' => $user->user_detail->id ])->with('my_status',
            ('登録されました') 
        );
    }
}
