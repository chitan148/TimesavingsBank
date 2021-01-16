@extends('layouts.basic')

@section('content')

@if (session('deposit_count_error'))
    <div class="container mt-2">
        <div class="alert alert-danger">
            {{ session('deposit_count_error') }}
        </div>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
@endif

<div class="container">
	<div class="row">
		<div class="col">
			<h1>クリアしたミッションを入力しましょう</h1>
			<h2>作成ミッション{{$count}}件</h2>
				{{-- "{{ route('users/{user_detail}/deposit/confirm', ['user_detail' => $user_detail_id])}}" --}}
				<form method="post" action="{{ route('deposit.confirm', ['user_detail' => $user_detail_id])}}"> 
					@csrf		
						@foreach ($missions as $mission)
							<div class="form-group col pink-sm">
								<img src="{{ asset('image/' . $mission->group_image) }}"　width="400" height="320">
								<P>{{ $mission->name }}</P>
								<p>むずかしさ：{{ $mission->difficulty }}</p>
								<p>もらえる時間：{{ $mission->time }}分</p>
								<input type="number" class="form-control font-default input-sm" placeholder="0" name="mission_id[{{ $mission->id }}]">
								<span>回</span>
							</div>
						@endforeach
					<div class="row">
						<div class="col-lg-2 offset-lg-5">
							<input type="submit" value="計算する" class="btn-lg">		
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>
@endsection