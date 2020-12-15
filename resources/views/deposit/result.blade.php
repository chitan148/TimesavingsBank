@extends('layouts.basic')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
            <p>{{ $user_name }}</p>
            <p>{{ $gland_total }}</p>
            <p>{{ $saving_time_old }}</p>
            <p>{{ $saving_time }}</p>
            <p>{{ $comment }}</p>
        </div>div>
    </div>
</div>
@endsection
