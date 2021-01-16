@extends('layouts.app')

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
                    <input type="text" class="form-control font-default" id="email" name="email" tabindex="1">  
                </div>
                <div class="form-group">
                    <label for="name">お名前</label>
                    <input type="text" class="form-control font-default" id="name"  name="name" tabindex="2">
                </div>
                <div class="form-group">
                    <label for="password">パスワード(8文字以上）</label>
                    <input type="password" class="form-control font-default" id="password" name="password" tabindex="3">
                </div>
                <div class="form-group">
                    <label for="password-confirm">パスワード（確認）</label>
                    <input type="password" class="form-control font-default" id="password-confirm" name="password_confirmation" tabindex="4">   
                </div>
                <p>性別</p>
                <div class="form-group">
                    @foreach(\App\UserDetail::GENDERS as $key => $value)
                        <div class="form-check form-check-inline">    
                            <input type="radio" class="form-check-input" id="gender" name="gender" value="{{$key}}">  
                            <label for="gender" class="form-check-label">{{$value}}</label>   
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            @foreach(\App\UserDetail::GENDERS as $key => $value)
                                <div class="form-check form-check-inline">    
                                    <input type="radio" class="form-check-input" id="male" name="gender" value="{{$key}}">  
                                    <label for="male" class="form-check-label">{{$value}}</label>   
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
