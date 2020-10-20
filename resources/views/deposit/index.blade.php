<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ミッション選択</title>
    </head>
    <body>
        <h1>クリアミッション入力</h1>
        <h3>ミッション{{$count}}件</h3>
        <form method="post" action="#">
            <div>
            @foreach ($missions as $mission)
                <div>
                  <img src="{{ $mission->group_image}}">
                  <h3>
                    {{ $mission->name }}
                  </h3>
                  <p>{{ $mission->difficulty }}</p>
                  <p>{{ $mission->time }}分</p>
                  <input type="number" name="{{ $mission->id }}">
                  <span>回</span>
                </div>
            @endforeach
            </div>
            <input type="submit" value="計算する">
          </form>
    </body>   
</html>