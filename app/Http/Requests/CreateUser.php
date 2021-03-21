<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\UserDetail;
use Illuminate\Validation\Rule;

class CreateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $gender_rule = Rule::in(array_keys(UserDetail::GENDER));
        return [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'group' => 'required|' . $gender_rule
        ];
    }
    public function attributes(){
        return [
            'name' => 'お名前',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'gender' => '性別'
        ];
    }
    public function messages()
    {
        //性別の型（男性・女性）を、UserDetailモデルからもらってくる。
        //keyがtypeのだけ配列にする
        $gender_types = array_map(
            function($gender){
                return $gender['type'];
            }, 
            UserDetail::GENDER);
        
        //読点を入れる
        $gender_types = implode('、', $gender_types);
        
        //ルール名をつけてメッセージを返す
        return [
            'gender.in' => ':attributeには'.$gender_types.'のどれかを選んで下さい'
        ];
    }
}
