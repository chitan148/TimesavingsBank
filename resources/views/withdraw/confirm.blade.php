@extends('layouts.basic')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
@endif

<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2 blue">
            <h1>入力内容を確認してください</h1>
                <div class="row outcome-wrapper">
                    <p class="col-lg-4 offset-lg-4">使った時間：{{ $withdraw_time }}分</p>
                </div>
            <p>残高から{{ $withdraw_time }}分減らします</p>
            <form method="post" action= "{{ route('withdraw.result', ['user_detail' => $user_detail_id]) }}" >
                @csrf
                <div class="form-group">
                    <label for="comment">ひとことコメント(無記入可)</label><br>
                    <textarea id="comment" name="comment" class="form-control font-default"></textarea>
                    <input type="submit" value="確認" class="btn-lg">
                </div>
            </form>
            <div class="row">
                <div class="col-lg-9"></div>
                <div class="col-lg-2">
                    <img src="{{ asset('image/turtle-boy.png') }}">
                </div>
                <div class="col-lg-1"></div>   
            </div>
        </div>
    </div>
</div>
@endsection