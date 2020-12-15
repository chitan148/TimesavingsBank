@extends('layouts.basic')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2 blue">
            <h1>使った時間を入力しましょう</h1>
            <form method="post" action= "{{ route('withdraw.confirm', ['user_detail' => $user_detail_id]) }}" >
                @csrf
                <div class="form-group"> 
                    <input type="number" placeholder="0" name="withdraw_time" class="form-control font-default input-sm">
                    <span>分</span><br>
                    <input type="submit" value="送信">
                </div>
                <div class="row">
                    <div class="col-lg-9"></div>
                    <div class="col-lg-2">
                        <img src="{{ asset('image/turtle-boy.png') }}">
                    </div>
                    <div class="col-lg-1"></div>   
                </div>
            </form>
        </div>
    </div>
</div>
@endsection