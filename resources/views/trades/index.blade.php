@extends('layouts.basic')

@section('content')
    <div class="container">
    	<div class="row">
            <div class="col green">
                <h1>{{$user_detail->name}}さんの取引履歴</h1>
                <div class="row">
                    <div class="col-lg-4 offset-lg-1 white">
                        <h2>入刻履歴</h2>
                        <div class="record_wrapper">
                            @foreach($trade_details_datas as $trade_details)
                               @foreach($trade_details as $trade_detail)
                                   @if($loop->first)
                                       <p>{{ $trade_detail->trade->trading_time }}分貯めました。</p>
                                       <p>残りは{{ $trade_detail->trade->time_save_now }}分です。</p>
                                       <p>「{{ $trade_detail->trade->comment }}」</p>
                                       <p>{{ $trade_detail->mission->name }}✕{{ $trade_detail->mission_count }}回</p>
                                   @else
                                       <p>{{ $trade_detail->mission->name }}✕{{ $trade_detail->mission_count }}回</p>
                                   @endif
                               @endforeach
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-4 offset-lg-2 white">
                        @foreach($trades as $trade)
                            @if ($trade->type === 2)
                                <p>{{ $trade->trading_time }}分使いました。</p>
                                <p>残りは{{ $trade->time_save_now }}分です。</p>
                                <p>「{{ $trade->comment }}」</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection