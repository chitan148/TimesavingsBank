<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Mission;
use Illuminate\Validation\Rule;
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
        //Missionモデルに定義したGROUPの、keyのみを配列で返してもらって、ルールオブジェクトに入れます。
        $group_rule = Rule::in(array_keys(Mission::GROUP));
        return [
            'name' => 'required|max:30|min:1', //文字がゼロ個以下または30個以上はエラーにする
            'time' => ['required', new positive_integers],//負の数はエラー
            'difficulty' => ['required', new difficulty],//１~５でないものはエラー
            'group' => 'required|' . $group_rule //GROUPで設定してないものはエラー
            //↑は、'group' => 'required|in(1, 2)' っていうのが出来る事になる。
            //in	指定されたリストの中の値に含まれているかどうか
        ];
    }
    public function attributes(){
        return [
            'name' => '「ミッション名」',
            'time' => '「もらえる時間」',
            'difficulty' => '「むずかしさ」',
            'group' => '「グループ」'
        ];
    }

    public function messages()
    {
        //グループのタイトル（習慣とか健康とか）を、モデルMissionのGROUP　からもらってくる。
        //array_mapで配列に関数を適用させる。配列＝Mission::GROUP に　関数＝titleがkeyのやつを呼び出してretrunするよ　
        $group_titles = array_map(
            function($group){
                return $group['title'];
            }, 
            Mission::GROUP);
        
        //implode もらってきた習慣とか健康を読点（、）でくっつけて再代入。
        $group_titles = implode('、', $group_titles);
        
        //group.inという名前のカスタムメッセージを作成
        //公式さん「ドット」記法を使用し行います。最初が属性名で、続いてルールをつなげます。
        return [
            'group.in' => ':attributeには、'. $group_titles. 'のどれかを選んで下さい'
        ];
    }
}
