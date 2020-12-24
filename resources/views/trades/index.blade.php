@extends('layouts.basic')

@section('content')
    <div class="container">
    	<div class="row">
            <div class="col green">
                <div class="record_wrapper">
                <h1>取引履歴</h1>
                    @foreach($trade_details_datas as $trade_details)
                       @foreach($trade_details as $trade_detail)
                           @if($loop->first)
                               <p>{{ $trade_detail->trade->trading_time }}貯めました。</p>
                               <p>残りは{{ $trade_detail->trade->time_save_now }}分です。</p>
                               <p>「{{ $trade_detail->trade->comment }}」</p>
                               <p>{{ $trade_detail->mission->name }}✕{{ $trade_detail->mission->count }}回</p>
                           @else
                               <p>{{ $trade_detail->mission->name }}✕{{ $trade_detail->mission->count }}回</p>
                           @endif
                       @endforeach
                    @endforeach
                </div>
                <div class="record_wrapper">
                    @foreach($trades as $trade)
                       <p>{{ $trade->trading_time }}</p>
                       <p>{{ $trade->time_save_now }}</p>
                       <p>{{ $trade->comment }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>   
@endsection