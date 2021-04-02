@extends('layouts.basic')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <nav class="card border border-0">
                <div class="card-header bg-transparent">ログイン</div>
    
                <div class="card-body light-blue">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="text" class="form-control form-control-lg font-default" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">パスワード</label>
                            <input type="password" class="form-control form-control-lg font-default" id="password" name="password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn-lg btn-lg-bottom">送信</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
