<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ミッション選択</title>
    </head>
    <body>
        <h1>クリアミッション入力</h1>
        <h3>ミッション{{$count}}件</h3>
        {{-- "{{ route('users/{user_detail}/deposit/confirm', ['user_detail' => $user_detail_id])}}" --}}
        <form method="post" action="{{ route('deposit.confirm', ['user_detail' => $user_detail_id])}}"> 
          @csrf
          <div>
            @foreach ($missions as $mission)
                <div>
                  <img src="{{ asset('image/' . $mission->group_image) }}"　width="400" height="320">
                  <h3>
                    {{ $mission->name }}
                  </h3>
                  <p>{{ $mission->difficulty }}</p>
                  <p>{{ $mission->time }}分</p>
                  <input type="number" placeholder="0" name="mission_id[{{ $mission->id }}]">
                  <span>回</span>
                </div>
            @endforeach
            </div>
            <input type="submit" value="計算する">
          </form>
    </body>   
</html>