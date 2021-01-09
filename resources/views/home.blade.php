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
                    <button><img src="{{ asset('image/m_tape_yellow.png') }}"></button>
                    <button><img src="{{ asset('image/m_tape_pink.png') }}"></button>
                    <button><img src="{{ asset('image/m_tape_blue.png') }}"></button>
                    <button><img src="{{ asset('image/m_tape_green.png') }}"></button>
                    <a href="">つくる</a>
                    <a href="">ためる</a>
                    <a href="">つかう</a>
                    <a href="">りれき</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
