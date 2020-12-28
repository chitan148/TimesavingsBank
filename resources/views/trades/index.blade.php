@extends('layouts.basic')

@section('content')
    <div class="container">
    	<div class="row">
            <div class="col green">
                <div class="row">
                    <div class="col-lg-2">
                        <img src="{{ asset('image/clock-sm.png') }}">
                    </div>
                    <div class="col-lg-8">   
                        <h1>
                            {{$user_detail->name}}さんの取引履歴
                            @if($user_detail->gender === 1)
                                <img src="{{ asset('image/turtle-boy-sm.png') }}">
                            @else
                                <img src="{{ asset('image/turtle-girl-sm.png') }}"> 
                            @endif
                        </h1>
                    </div>
                        <img src="{{ asset('image/time_lose.png') }}">
                    <div class="col-lg-2">

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 offset-lg-1 white">
                        <h2>入刻履歴</h2>
                        <div class="record_wrapper">
                            @foreach($user_detail->trades as $trade)
                               @foreach($trade->trade_details as $trade_detail)
                                    @if($loop->first)
                                        <div class="card">
                                            <div class="card-header deposit_color">{{ $trade_detail->trade->created_at->format('Y年m月d日') }}</div>
                                            <div class= "card-body">  
                                                <p>{{ $trade_detail->trade->trading_time }}分貯めました。</p>
                                                <p>残りは{{ $trade_detail->trade->time_save_now }}分です。</p>
                                                <p>「{{ $trade_detail->trade->comment }}」</p>
                                            </div>
                                        </div>
                                        <div class="mission_record">
                                            <p>{{ $trade_detail->mission->name }}✕{{ $trade_detail->mission_count }}回</p>
                                        </div>
                                   @else
                                        <div class="mission_record">
                                            <p>{{ $trade_detail->mission->name }}✕{{ $trade_detail->mission_count }}回</p>
                                        </div>   
                                   @endif
                               @endforeach
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-4 offset-lg-2 white">
                        <h2>出刻履歴</h2>
                        <div class="record_wrapper">
                            @foreach($user_detail->trades as $trade)
                                @if ($trade->type === 2)
                                    <div class="card">
                                        <div class="card-header withdraw_color">{{ $trade->created_at->format('Y年m月d日') }}</div>
                                        <div class= "card-body">
                                            <p>{{ $trade->trading_time }}分使いました。</p>
                                            <p>残りは{{ $trade->time_save_now }}分です。</p>
                                            <p>「{{ $trade->comment }}」</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection