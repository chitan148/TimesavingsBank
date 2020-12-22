<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>取引履歴</title>   
    </head>
    <body>
        <h2>取引履歴</h2>
        @foreach($trades as $trade)
            <p>{{ $trade->id }}</p>
            <p>{{ $trade->user_detail_id }}</p>
            <p>{{ $trade->trading_time }}</p>
            <p>{{ $trade->time_save_now }}</p>
            <p>{{ $trade->comment }}</p>
            <p>{{ $trade->type }}</p>
            <p>{{ $trade->user_detail->name }}</p>
            <p>{{ $trade_detail->mission->name }}</p>
        @endforeach
    </body>
</html>