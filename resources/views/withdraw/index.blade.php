<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>出刻時間入力ページ</title>   
    </head>
    <body>
        <h2>使用時間のご入力</h2>
        <form method="post" action= " {{-- {{ route('withdraw.confirm', ['user_detail' => $user_detail_id]) }} --}} " >
            <input type="number" placeholder="0" name="withdraw_time">
            <span>分</span><br>
            <input type="submit" value="出刻">
        </form>
    </body>
</html>