<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\positive_integers;

class WithdrawTime extends FormRequest
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
            'withdraw_time' => ['required', new positive_integers]//0及び負の数はエラー
        ];
    }
    public function attributes(){
        return [
            'withdraw_time' => '「使った時間」',
        ];
    }
}
