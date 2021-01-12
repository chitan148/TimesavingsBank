<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\positive_integers;

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
            'name' => 'required|max:20|min:1', //文字がゼロ個はエラーにする
            'time' => ['required', new positive_integers]//負の数はエラー
        ];
    }
    public function attributes(){
        return [
            'name' => '「ミッション名」',
            'time' => '「もらえる時間」'
        ];
    }

}
