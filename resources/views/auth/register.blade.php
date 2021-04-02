@extends('layouts.basic')

@section('content')
<div class="container">
    <div class="row">
        <div class=" col-lg-8 offset-lg-2 purple">
            <h1>お客様情報のご入力</h1>
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf    
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="text" class="form-control font-default" id="email" name="email" required tabindex="1">  
                </div>
                <div class="form-group">
                    <label for="name">お名前</label>
                    <input type="text" class="form-control font-default" id="name"  name="name" required tabindex="2">
                </div>
                <div class="form-group">
                    <label for="password">パスワード(8文字以上）</label>
                    <input type="password" class="form-control font-default" id="password" name="password" minlength="8" required tabindex="3">
                </div>
                <div class="form-group">
                    <label for="password-confirm">パスワード（確認）</label>
                    <input type="password" class="form-control font-default" id="password-confirm" name="password_confirmation" required tabindex="4">   
                </div>
                <p>性別</p>
                <div class="form-group">
                    @foreach(\App\UserDetail::GENDERS as $key => $value)
                        <div class="form-check form-check-inline">    
                            <input type="radio" class="form-check-input" id="gender" name="gender" value="{{$key}}" required tabindex="5">  
                            <label for="gender" class="form-check-label">{{ $value['type'] }}</label>   
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn-lg">送信</button>        
            </form>
            <div class="row">
                <div class="col-lg-2">
                    <img src="image/clock.png">
                </div>
                <div class="col-lg-7"></div>
                <div class="col-lg-3">
                    <img src="image/turtle-girl.png">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
