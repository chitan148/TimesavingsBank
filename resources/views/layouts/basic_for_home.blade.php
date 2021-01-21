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
        //黄色 →　青　
        const imgY = document.getElementById('tape_y');

        // let src = imgY.getAttribute('src');

        function overY(){
            imgY.setAttribute('src','image/m_tape_blue.png');
        }       

        function leaveY(){
            imgY.setAttribute('src', 'image/m_tape_yellow.png');
        }       

        imgY.addEventListener('mouseover',overY);
        imgY.addEventListener('mouseleave',leaveY);

        //ピンク→緑
        const imgP = document.getElementById('tape_p');

        // let src = imgP.getAttribute('src');

        function overP(){
            imgP.setAttribute('src','image/m_tape_green.png');
        }       

        function leaveP(){
            imgP.setAttribute('src', 'image/m_tape_pink.png');
        }       

        imgP.addEventListener('mouseover',overP);
        imgP.addEventListener('mouseleave',leaveP);

        //青 →　黄色　
        const imgB = document.getElementById('tape_b');

        // let src = imgY.getAttribute('src');

        function overB(){
            imgB.setAttribute('src','image/m_tape_yellow.png');
        }       

        function leaveB(){
            imgB.setAttribute('src', 'image/m_tape_blue.png');
        }       

        imgB.addEventListener('mouseover',overB);
        imgB.addEventListener('mouseleave',leaveB);

        //緑→ピンク
        const imgG = document.getElementById('tape_g');

        // let src = imgP.getAttribute('src');

        function overG(){
            imgG.setAttribute('src','image/m_tape_pink.png');
        }       

        function leaveG(){
            imgG.setAttribute('src', 'image/m_tape_green.png');
        }       

        imgG.addEventListener('mouseover',overG);
        imgG.addEventListener('mouseleave',leaveG);

    </script>
    <!--<script>
        const img = document.getElementById('m_tape');

        let src = img.getAttribute('src');

        function over(){
            img.setAttribute('src','image/m_tape_blue.png');
        }       

        function leave(){
            img.setAttribute('src', 'image/m_tape_yellow.png');
        }       

        img.addEventListener('mouseover',over);
        img.addEventListener('mouseleave',leave);

    </script>
    <script>
        const img = document.getElementById('m_tape');
        let src = img.getAttribute('src');
        
        function over() {
            img.setAttribute('src', 'image/m_tape_pink.png');
        }
        function leave() {
            img.setAttribute('src', 'image/m_tape_yellow.png');
        }
        img.onmouseover = over;
        img.onmouseleave = leave;

    </script> -->
</body>
</html>