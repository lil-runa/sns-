@extends('layouts.login')

@section('content')
<body>
  <head>
    <div class="search-area">
      <div class="search-word">
      @if(isset ($search))
      <P class="">検索ワード：{{$search}}</p>
      @endif
      </div>
    <div class="search-form">
      <form action="/search" method="GET" >
        <input type="text" name="search" class="search-control" placeholder="ユーザー名">
        <input type="image" src="images/search.png" class="search-btn">
      </form>
    </div>
  </div>
</head>


    @foreach ($user as $users)
    @if ($users->id !== Auth::user()->id)
    <ul class="user-area">
      <div class="user-list">

        <img src="{{ asset('storage/images/' . $users->images)}}" class="s-icon">
        <p class="s-user">{{ $users->username }}</p>
      </div>
        <div class="follow-btn">
            @if (auth()->user()->isFollowing($users->id))
                <form action="{{ route('unfollow', ['id' => $users->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn-bye">フォロー解除</button>
                </form>
            @else
                <form action="{{ route('follow', ['id' => $users->id]) }}" method="POST">
                    {{ csrf_field() }}

                    <button type="submit" class="btn-wel">フォローする</button>
                </form>
            @endif
                      </div>
            @endif

    </ul>


@endforeach
</body>


@endsection
