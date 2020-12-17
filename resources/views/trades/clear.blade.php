<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>取引詳細</title>   
    </head>
    <body>
        <h2>取引詳細</h2>
        <p>{{ $var }}</p>
        @foreach( $missions as $mission )
            <p>{{ $mission['mission_name'] }}</p>
            <p>{{ $mission['mission_count'] }}</p>
        @endforeach
    </body>
</html>