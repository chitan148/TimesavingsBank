<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>出刻時間確認ページ</title>   
    </head>
    <body>
        <h2>使用時間のご確認</h2>
        <p>{{ $withdraw_time }}分</p>
        <p>上記の時間を出刻致します</p>
        <form method="post" action= "{{-- {{ route('withdraw.result', ['user_detail' => $user_detail_id]) --}} }}" >
            <input type="submit" value="OK">
        </form>
    </body>
</html>