<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Builders Bank</title>
    </head>
    <body>
        @foreach($missions as $mission)
            <p>{{$mission}}</p>
        @endforeach
        <p>{{$count}}</p>
    </body>   
</html>