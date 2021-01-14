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
		<div class="col-lg-8 offset-lg-2 pink">
            <h1>入力内容を確認してください</h1>
            <div class="row outcome-wrapper">
                @foreach($missions as $mission)
                    <div class="col-lg-6">
                        <p class="deposit-amount">{{ $mission['name'] }}（{{ $mission['time'] }}分）
                        x
                        {{ $mission['deposit_count'] }}回
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <p class="deposit-time">{{ $mission['subtotal'] }}分</p>
                    </div>
                @endforeach
            </div>
            <p>合計報酬時間{{ $gland_total }}分</p>
            <form method="post" action="{{ route('deposit.result', ['user_detail' => $user_detail_id])}}">
                @csrf
                <div class="form-group">
                    <label for="comment">ひとことコメント(無記入可/50文字以内)</label><br>
                    <textarea id="comment" name="comment" class="form-control font-default">
                        @isset($comment)
                            {{ $comment }}
                        @endisset
                    </textarea>
                    <input type="submit" value="送信" class="btn-lg">
                </div>
            </form> 
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