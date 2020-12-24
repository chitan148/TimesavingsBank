<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>取引履歴</title>   
    </head>
    <body>
        <h1>取引履歴</h1>

        @foreach($trade_details_datas as $trade_details)
            @foreach($trade_details as $trade_detail)
                @if($loop->first)
                    <p>{{ $trade_detail->trade->trading_time}}</p>
                    <p>{{ $trade_detail->trade->time_save_now}}</p>
                    <p>{{ $trade_detail->trade->comment}}</p>
                    <p>{{ $trade_detail->mission->name }}</p>
                @else
                    <p>{{ $trade_detail->mission->name }}</p>
                @endif
            @endforeach
        @endforeach

        @foreach($trades as $trade)
            <p>{{ $trade->trading_time }}</p>
            <p>{{ $trade->time_save_now }}</p>
            <p>{{ $trade->comment }}</p>
        @endforeach
        
    </body>
</html>