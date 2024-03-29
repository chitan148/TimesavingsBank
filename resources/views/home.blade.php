@extends('layouts.basic_for_home')

@section('content')

@if (session('my_status'))
    <div class="container mt-2">
        <div class="alert alert-success">
            {{ session('my_status') }}
        </div>
    </div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col key-visual">
            <div class="row">
                <img class="key-picture" src="{{ asset('image/key-picture.png') }}" alt="びるだーず">
            </div>
            <div class="row">
                <div class="col-lg-8 offset-2 guide-wrapper">    
                    <a href="{{ route('missions.create', ['user_detail' => $user_detail_id]) }}"><img id="tape_y" src="{{ asset('image/m_tape_yellow_default.png') }}"></a>
                    <a href="{{ route('deposit.index', ['user_detail' => $user_detail_id]) }}"><img id="tape_p" src="{{ asset('image/m_tape_pink_default.png') }}"></a>
                    <a href="{{ route('withdraw.index', ['user_detail' => $user_detail_id]) }}"><img id="tape_b" src="{{ asset('image/m_tape_blue_default.png') }}"></a>
                    <a href="{{ route('trade.index', ['user_detail' => $user_detail_id]) }}"><img id="tape_g" src="{{ asset('image/m_tape_green_default.png') }}"></a>
                    <!-- <a href="{{ asset('image/pdf_test.png')}}" target="_blank" rel="noopener noreferrer"><img id="tape_pu" src="{{ asset('image/m_tape_purple_default.png') }}"></a> -->
                    <!-- <a download href="{{ asset('image/pdf_test.png')}}">せつめい</a> -->
                    <!-- <a href="{{ route('missions.create', ['user_detail' => $user_detail_id]) }}">つくる</a> -->
                    <!-- <a href="{{ route('deposit.index', ['user_detail' => $user_detail_id]) }}">ためる</a>
                    <a href="{{ route('withdraw.index', ['user_detail' => $user_detail_id]) }}">つかう</a>
                    <a href="{{ route('trade.index', ['user_detail' => $user_detail_id]) }}">りれき</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('share.eventlistener.scripts_for_link_button') <!--share/eventlistener/scripts_for_link_button.blade.phpを読み込み-->
@endsection