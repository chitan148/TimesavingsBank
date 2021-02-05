<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Password Reset Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */

    'reset' => 'パスワードを再設定致しました。',
    'sent' => 'パスワード再設定ページへのリンクを送信致しました。メールをご確認下さい。届かない場合は、ご入力頂いたメールアドレスが間違っているか、迷惑メールアドレスに入っている可能性があります。ご確認の上、再度ご操作願います。',
    'throttled' => 'Please wait before retrying.',
    'token' => 'トークンが無効です。',
    'user' => "パスワード再設定ページへのリンクを送信致しました。メールをご確認下さい。届かない場合は、ご入力頂いたメールアドレスが間違っているか、迷惑メールアドレスに入っている可能性があります。ご確認の上、再度ご操作願います。",
    //userは、アドレス間違いメッセージ。アドレス特定に寄与してしまうので、合っている時と同じメッセージにする。
    //userだけダブルコーテーションは何か意味ありそう。

];
