<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ミッション選択</title>
    </head>
    <body>
        <h1>クリアミッション入力</h1>
        <h3>ミッション{{$count}}件</h3>
        @foreach($missions as $mission)
            <p>{{ $mission->name }}</p>
            <p>{{ $mission->time }}</p>
            <p>{{ $mission->difficulty }}</p>
            <p>{{ $mission->group }}</p>
        @endforeach
        <p>{{$count}}</p>
    </body>   
</html>