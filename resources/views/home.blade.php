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
        <div class="col no-gutters">
          <img class="img-fluid" src="{{ asset('image/cork_board.jpg') }}">
        </div>
    </div>
</div>
@endsection
