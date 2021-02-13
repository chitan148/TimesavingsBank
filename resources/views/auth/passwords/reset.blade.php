@extends('layouts.basic')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <nav class="card border border-0">
                <div class="card-header bg-transparent">パスワード再登録</div>
                <div class="card-body light-blue">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group text-left">
                            <label for="email">メールアドレス</label>
                            <input type="email" class="form-control form-control-lg font-default" id="email" name="email">
                                @error('email')
                                    <span class="error-message">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            <p>{{ $token }}</p>
                            <p>{{ $email }}</p>
                        </div>
                        <div class="form-group text-left">
                            <label for="password">新しいパスワード</label>
                            <input type="password" class="form-control form-control-lg font-default" id="password" name="password">
                        </div>
                        <div class="form-group text-left">
                            <label for="password-confirm">新しいパスワード（確認）</label>
                            <input type="password" class="form-control form-control-lg font-default" id="password-confirm" name="password_confirmation">
                                @error('password')
                                    <span class="error-message">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn-lg btn-lg-bottom">送信</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
