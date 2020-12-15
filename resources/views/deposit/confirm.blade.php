@extends('layouts.basic')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2 pink">
        @foreach($missions as $mission)
            <p>{{ $mission['name'] }}</p>
            <p>{{ $mission['time'] }}</p>
            <p>{{ $mission['deposit_count'] }}</p>
            {{-- <p>{{ $mission['var'] }}</p> --}}
            <p>{{ $mission['subtotal'] }}</p>
        @endforeach
        <p>{{ $gland_total }}</p>
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