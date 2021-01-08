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
          <img class="key-picture" src="{{ asset('image/key-picture.png') }}">
        </div>
    </div>
</div>
@endsection
