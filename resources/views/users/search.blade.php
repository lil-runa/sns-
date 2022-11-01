@extends('layouts.login')

@section('content')
<body>
  <head>
    <div class="search-area">
    <div class="search-form">
      <form action="/search" method="GET" >
        <input type="text" name="search" class="search-control" placeholder="ユーザー名">
        <input type="image" src="images/search.png" class="search-btn">
      </form>
    </div>
    @if(isset ($search))
      <p class="search-word">検索ワード：{{$search}}</p>
      @endif
</head>
    </div>


<div class=user-box>
    @foreach ($user as $users)
    <ul>
      <p class="user-list">{{ $users->username }}</p>
        @if (auth()->user()->isFollowed($users->id))
          <div class="px-2">
              <span class="px-1 bg-secondary text-light">フォローされています</span>
          </div>
        @endif
        <div class="d-flex justify-content-end flex-grow-1">
          @if ($users->id != auth()->user()->id)
            @if (auth()->user()->isFollowing($users->id))
                <form action="{{ route('unfollow', ['id' => $users->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn-danger">フォロー解除</button>
                </form>
            @else
                <form action="{{ route('follow', ['id' => $users->id]) }}" method="POST">
                    {{ csrf_field() }}

                    <button type="submit" class="btn-primary">フォローする</button>
                </form>
            @endif
            @endif
    </ul>

                            </div>
                        </div>
@endforeach
</div>
</body>


@endsection
