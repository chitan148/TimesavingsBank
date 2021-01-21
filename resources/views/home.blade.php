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
                    <button><img id="m_tape" src="{{ asset('image/m_tape_yellow.png') }}" ></button>
                    <button><img id="m_tape" src="{{ asset('image/m_tape_yellow.png') }}"></button>
                    <button><img id="m_tape" src="{{ asset('image/m_tape_yellow.png') }}"></button>
                    <button><img id="m_tape" src="{{ asset('image/m_tape_yellow.png') }}"></button>
                    <a href="{{ route('missions.create', ['user_detail' => $user_detail_id]) }}">つくる</a>
                    <a href="{{ route('deposit.index', ['user_detail' => $user_detail_id]) }}">ためる</a>
                    <a href="{{ route('withdraw.index', ['user_detail' => $user_detail_id]) }}">つかう</a>
                    <a href="{{ route('trade.index', ['user_detail' => $user_detail_id]) }}">りれき</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
