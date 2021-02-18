@extends('layouts.basic')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <nav class="card border border-0">
                <div class="card-header bg-transparent">パスワード再登録</div>
                <div class="card-body light-blue">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="text-left guidance">登録されているメールアドレスをご入力下さい。<br>パスワード再登録ページへのリンクをお送りいたします。</p>
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="email" class="form-control form-control-lg font-default" id="email" name="email" required>
                                @error('email')
                                    <span class="error-message">
                                        <strong>{{ $message }}</strong>
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
