<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Timesavings Bank</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="stylesheet_test.css">
    </head>
    <body>
        <header>
            <nav class="my-navbar">
                <a class="my-navbar-brand" href="/">ToDo App</a>
                <div class="my-navbar-control">
                    @if(Auth::check())
                        <span class="my-navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>
                        <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
                        <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
                    @endif
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 purple">
                    <h1>お客様情報のご入力</h1>
                    <form action="create_user_info.php" method="post">
                        <div class="form-group">
                            <label for="mail">メールアドレス</label>
                            <input type="text" class="form-control form-control-lg" name="mail" tabindex="1">  
                        </div>
                        <div class="form-group">
                            <label for="name">お名前</label>
                            <input type="text" class="form-control form-control-lg" id="name"  name="name" tabindex="2">
                        </div>
                        <div class="form-group">
                            <label for="password">パスワード</label>
                            <input type="text" class="form-control form-control-lg" name="password" tabindex="3">
                        </div>
                        <p>性別</p>
                        <div class="form-group">
                            <div class="form-check form-check-inline">    
                                <input type="radio" class="form-check-input" id="male" name="gender" value="male" tabindex="4" checked="checked">  
                                <label for="male" class="form-check-label">男性</label>   
                            </div>
                            <div class="form-check form-check-inline"> 
                                <input type="radio" class="form-check-input" id="female" name="gender" value="female" tabindex="5">
                                <label for="female" class="form-check-label">女性</label>     
                            </div>
                        </div>
                        <input type="submit" value="送信" class="btn-lg">
                    </form>  
                </div>
                <div class="col-lg-2"></div>               
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="img/clock.png">
                        </div>
                        <div class="col-lg-8"></div>
                        <div class="col-lg-2">
                            <img src="img/turtle-girl.png">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>   
            </div>
        </div>   
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>