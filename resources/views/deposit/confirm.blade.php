@extends('layouts.basic')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2 pink">
            <h1>入力内容を確認してください</h1>
            <div class="row">
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
            <p>合計報酬時間{{ $gland_total }}</p>
            <form method="post" action="{{ route('deposit.result', ['user_detail' => $user_detail_id])}}">
                @csrf
                <label for="comment">ひとことコメント(無記入可)</label><br>
                <textarea id="comment" name="comment"></textarea>
                <input type="submit" value="送信">
            </form> 
        </div>
    </div>
</div>
@endsection