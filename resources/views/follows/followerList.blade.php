@extends('layouts.login')

@section('content')
<body>
  <head>
    <h2>Follower List</h2>
    @foreach ($users as $user)
    <div class=followList-area>
     <p>{{$user->username}}</p>
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
