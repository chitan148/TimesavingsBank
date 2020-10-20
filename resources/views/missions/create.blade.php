<DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>ミッション作成お試し画面</title>
    </head>
    <body>
        <form method="POST" action="{{ route('missions.create', ['user_detail' => $user_detail_id ])}}">
            @csrf
            <h1>ミッションを作ります</h1>
            <label for="name">ミッション名</label><br>
            <input type="text" id="name" name="name" >
            <br>
            <label for="name">もらえる時間</label><br>
            <input type="number" id="time" name="time">
            <br>
            <label for="name">むずかしさ</label><br>
            <input type="number" id="difficulty" name="difficulty">
            <br>
            <span>グループ</span><br>
            <select name="image" id="image" class="form-control">
                @foreach(\App\Mission::GROUP as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                @endforeach
            </select>
            <br>
            <input type="submit" value="送信" class="btn-lg">
        </form>
    </body>
</html>