@extends('layouts.login')

@section('content')
<body>
  <head>
    <h2>Follow List</h2>
    @foreach ($users as $user)
    <div class=followList-area>
      <img src="/storage/{{Auth::user()->images}}">
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
