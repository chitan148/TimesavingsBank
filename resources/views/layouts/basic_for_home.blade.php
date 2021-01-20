<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Timesavings Bank</title>
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('/css/ress.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/tsb.css') }}">    
</head>
<body>
    <header>
        <nav class="my-navbar_home">
            <a class="my-navbar-brand" href="/">Timesavings Bank</a>
            <div class="my-navbar-control">
                @if(Auth::check())
                    <span class="my-navbar-item">ようこそ, {{ Auth::user()->user_detail->name }}さん</span>
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
    <script>

    // const img = document.getElementById('m_tape');

    // let src = img.getAttribute('src');

    // function over(){
    //     img.setAttribute('src','/image/m_tape_blue.png');
    // }

    // function leave(){
    //     img.setAttribute('src', 'image/m_tape_yellow.png');
    // }

    // img.addEventListener('onmouseover',over);
    // img.addEventListener('onmouseleave',leave);
        
        // function over() {
        //     const img = document.getElementById('m_tape');
        //     img.setAttribute('src', 'image/m_tape_pink.png');
        // }
        // function leave() {
        //     const img = document.getElementById('m_tape');
        //     img.setAttribute('src', 'image/m_tape_yellow.png');
        // }
   
        // function over() {
        // //     const img_passes = ['image/m_tape_pink.png', 'image/m_tape_yellow.png','image/m_tape_blue.png','image/m_tape_green.png']
        //     const img = document.getElementById('m_tape');
        //     const src = img.getAttribute('src');
        //     let img_pass;
        // //     if(src === img_passes[1]){
        // //         img_pass = img_passes[0]
        // //     } else if(src === img_passes[0]) {
        // //         img_pass = img_passes[2]
        // //     } else if(src === img_passes[2]){
        // //         img_pass = img_passes[3]
        // //     } else if(src === img_passes[3]){
        // //         img_pass = img_passes[1]
        // //     }
        //     if(src === 'image/m_tape_yellow.png'){
        //         img.setAttribute('src','/image/m_tape_blue.png');
        //     }
           
        // }
        // function leave() {
        //     var img = document.getElementById('m_tape');
        //     img.setAttribute('src', 'image/m_tape_yellow.png');
        // }
    
    </script>
    <main>
        @if(Auth::check())
            <script>
                document.getElementById('logout').addEventListener('click', function(event){//idがlogoutの要素の中身をclickしたときに、
                    event.preventDefault();
                    document.getElementById('logout-form').submit();//idがlogout-formの要素の中身をsubmitするよ！画面には出さないけど
                });
            </script>
        @endif
        @yield('content')
    </main>
    {{-- @yield('scripts') js最後まで使わなかったら削除 --}}
    <script>
        const img = document.getElementById('m_tape');

        let src = img.getAttribute('src');

        function over(){
            img.setAttribute('src','/image/m_tape_blue.png');
        }       

        function leave(){
            img.setAttribute('src', 'image/m_tape_yellow.png');
        }       

        img.addEventListener('onmouseover',over);
        img.addEventListener('onmouseleave',leave);

    </script>
</body>
</html>