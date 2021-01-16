<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\positive_integers;
use App\Rules\difficulty;

class CreateMission extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//今回は使わない為
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:30|min:1', //文字がゼロ個以下または30個以上はエラーにする
            'time' => ['required', new positive_integers],//負の数はエラー
            'difficulty' => ['required', new difficulty]//１~５でないものはエラー
        ];
    }
    public function attributes(){
        return [
            'name' => '「ミッション名」',
            'time' => '「もらえる時間」',
            'difficulty' => '「むずかしさ」',
        ];
    }
}
