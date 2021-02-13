<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Log;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    //リンクを送るのが失敗な方の処理関数（登録されてないメルアドだった）をオーバーライド
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {//リスエストがJSONを要求しているか判定する…？
            throw ValidationException::withMessages([
                'email' => [trans($response)],
            ]);
        }
        
        $response = Password::RESET_LINK_SENT; //Passwordクラスに定義されている変数（翻訳前メッセージ）
                //成功の時と同じメッセージを返して、エラーであることは伏せておく。
        return back()->with('status', trans($response));//ステータスに翻訳したメッセージを入れて直前ページに戻る

        // return back()　//PasswordBroker.phpの分岐で、is_nullメソッドがtrueで、INVALID_USERが入ってる
        //         ->withInput($request->only('email')) //onlyは　"だけ"　じゃなくて　"のみ"　取得しますっていうやつ　※exceptは "除いて"
        //         ->withErrors(['email' => trans($response)]);　emailキーで翻訳を渡している。
    }
}