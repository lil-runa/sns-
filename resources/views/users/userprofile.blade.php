@extends('layouts.login')


@section('content')
<body>
  <head>
    <div class="user-profile">
        @foreach ($user as $users)
        <img src="{{asset('storage/images/' . $users->images)}}" class="p-icon">
        <div class="otherName">
          <label>name</label>
            <div class="p-name">{{ $users->username }}</div>
        </div>
        <div class="otherBio">
          <label>bio</label>
           <div class="p-bio">{{ $users->bio }}</div>
        </div>
        @endforeach
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
    </div>
  </head>

  <div class="card-content">
    @foreach ($post as $posts)
     <div><ul>
                <li>
                  <div class="post-content">
                    <img src="{{asset('storage/images/' . $users->images)}}" class=li-icon>
                  <div class=li-name>{{ $users->username}}</div>
                  <div class="li-time">{{ $posts->created_at }}</div>
                  <div class="li-post">{{ $posts->post }}</div>
                  </div>
                </li>
            </ul></div>
    @endforeach
  </div>
</body>
@endsection
