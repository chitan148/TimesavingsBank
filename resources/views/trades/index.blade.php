<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>取引履歴</title>   
    </head>
    <body>
        <h2>取引履歴</h2>
        @foreach($trade_details_datas as $trade_details)
            @foreach($trade_details as $trade_detail)
                @if($loop->first)
                    <p></p>
                    <p>{{ $trade_detail->mission->name }}</p>
                @else
                    <p>{{ $trade_detail->mission->name }}</p>
            @endforeach
        @endforeach

        @foreach($trades as $trade)
            <p>{{ $trade->id }}</p>
            <p>{{ $trade->user_detail_id }}</p>
            <p>{{ $trade->trading_time }}</p>
            <p>{{ $trade->time_save_now }}</p>
            <p>{{ $trade->comment }}</p>
            <p>{{ $trade->type }}</p>
            <p>{{ $trade->user_detail->name }}</p>
        @endforeach
        
        {{-- <p>{{ $var }}</p> --}}
        <p>{{ $var2 }}</p>
        {{--@foreach( $missions as $mission )
            <p>{{$mission['mission_name']}}</p>
        @endforeach --}}
    </body>
</html>