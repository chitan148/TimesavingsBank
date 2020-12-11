@extends('layouts.basic')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 yellow">
            <form method="POST" action="{{ route('missions.create', ['user_detail' => $user_detail_id ])}}">
                @csrf
                <h1>ミッションを作ります</h1>
                <div class="form-group">
                    <label for="name">ミッション名</label>
                    <input type="text" class="form-control font-default " id="name" name="name" >
                </div>
                <div class="form-group">
                    <label for="time">もらえる時間</label>
                    <input type="number" class="form-control font-default " id="time" name="time">
                </div>
                <div class="form-group">
                    <label for="difficulty">むずかしさ</label><br>
                    <input type="number" class="form-control font-default " id="difficulty" name="difficulty">
                </div>
                <div class="form-group">
                    <span>グループ</span><br>
                    <select name="group" id="group" class="form-control font-default">
                       @foreach(\App\Mission::GROUP as $key => $value)
                           <option value="{{ $key }}">
                               {{ $value['title'] }}
                           </option>
                       @endforeach
                    </select>
                </div>
                <br>
                <input type="submit" value="送信" class="btn-lg">
            </form>
        </div>
    </div>
</div>
@endsection