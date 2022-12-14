@extends('layouts.login')


@section('content')
<body>
  <head>
    @foreach ($user as $users)
     <img src="{{asset('storage/images/' . $users->images)}}" >
     <div class="otherName">name  {{ $users->username }}</div>
     <div class="otherBio">bio  {{ $users->bio }}</div>
     @endforeach
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
  </head>

  <div>
    @foreach ($post as $posts)
     <div><ul>
                <li>
                  <div class="post-content">
                  <div class=li-name>{{ $posts->username}}</div>
                  <div class="li-time">{{ $posts->created_at }}</div>
                  <div class="li-post">{{ $posts->post }}</div>
                  </div>
                </li>
            </ul></div>
    @endforeach
  </div>
</body>
@endsection
