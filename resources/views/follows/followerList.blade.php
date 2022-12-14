@extends('layouts.login')

@section('content')
<body>
  <head>
    <h2>Follower List</h2>
    @foreach ($users as $user)
    <div class=followList-area>
     <a href="/users/{{ $user->id }}/otherProfile"><img src="{{ asset('storage/images/' . $user->images)}}" ></a>
    </div>
    @endforeach
  </head>

  <div class=followPost>
    @foreach ($posts as $post)
    <p>{{$post->post}}</p>
    @endforeach
  </div>

</body>
@endsection
