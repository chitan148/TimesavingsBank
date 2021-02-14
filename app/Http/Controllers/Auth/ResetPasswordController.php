<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;//間違えて2回メアドを送った時用

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    // public function showResetForm(Request $request, $token = null)
    // {
    //     $var = var_dump($request->email);
    //     return view('auth.passwords.reset')->with(
    //         ['token' => $token, 'email' => $request->email, 'var' => $var]
    //     );
        
    // }
    
    // //パスワードリセットに成功した時
    // protected function sendResetResponse(Request $request, $response)
    // {
    //     if ($request->wantsJson()) {
    //         return new JsonResponse(['message' => trans($response)], 200);
    //     }

    //     return redirect()->route('login')->with('status', trans($response));
    // }

    //パスワードリセットに失敗した時
    protected function sendResetFailedResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'email' => [trans($response)],
            ]);
        }
        //成功と同じメッセージを返す
        $response = Password::PASSWORD_RESET;

        return redirect($this->redirectPath())
                            ->with('status', trans($response));
        // return back() //ResetPasswords.phpでは redirect()->back() だったけどこっちでもいける。謎。
        //             ->withInput($request->only('email'))
        //             ->withErrors(['email' => trans($response)]);
        
    }
    protected function resetPassword($user, $password)
    {
        $this->setUserPassword($user, $password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));
        //ログインはしなくていいのでコメントアウト
        // $this->guard()->login($user);
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::LOGIN;
}
