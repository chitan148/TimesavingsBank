<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>confirm</title>
    </head>
    <body>
        <p>{{ $dump }}</p>
        @foreach($missions as $mission)
            <p>{{ $mission['name'] }}</p>
            <p>{{ $mission['time'] }}</p>
            <p>{{ $mission['deposit_count'] }}</p>
            <p>{{ $mission['var'] }}</p>
        @endforeach
    </body>
</html>