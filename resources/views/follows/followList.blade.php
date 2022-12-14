@extends('layouts.login')

@section('content')
<body>
  <head>
  <div class="follow-area">
    <h2>Follow List</h2>
    @foreach ($users as $user)
    <div class=followList>
      <a href="/users/{{ $user->id }}/otherProfile"><img src="{{ asset('storage/images/' . $user->images)}}" class="follow-icon"></a>
    </div>
    @endforeach
  </div>
  </head>

  <div class=followPost>
    @foreach ($posts as $post)
    <img src="{{ 'storage/images/' . $post->images}}" class=li-icon>
    <p>{{$post->username}}</p>
    <p>{{$post->post}}</p>
    @endforeach
  </div>

</body>

@endsection
