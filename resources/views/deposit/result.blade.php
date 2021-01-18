@extends('layouts.basic')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2 pink">
            <h1>入刻の結果</h1>
            <div class="row outcome-wrapper">
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <p class="deposit-amount">入刻前の残高</p>
                    <p class="deposit-amount">入刻時間</p>
                    <p class="deposit-amount">入刻後の残高</p>
                </div>
                <div class="col-lg-4">
                    <p class="deposit-time">{{ $saving_time_old }}分</p>
                    <p class="deposit-time">{{ $gland_total }}分</p>
                    <p class="deposit-time">{{ $saving_time }}分</p>
                </div>
                <div class="col-lg-1"></div>
            </div>
            <p>{{ $user_name }}様</p>
            <p>現在の残高：{{ $saving_time }}分</p>
            <div class="row">
                <div class="col-lg-9"></div>
                <div class="col-lg-2">
                    <img src="{{ asset('image/turtle-girl.png') }}">
                </div>
                <div class="col-lg-1"></div>   
            </div>
        </div>
    </div>
</div>
@endsection