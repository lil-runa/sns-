@extends('layouts.login')

@section('content')
<body>
  <head>
    <div class="container">
  <div class="follow-area">
    <h2>Follow List</h2>
    @foreach ($users as $user)
    <div class=followList>
      <a href="/users/{{ $user->id }}/otherProfile"><img src="{{ asset('storage/images/' . $user->images)}}" class="follow-icon"></a>
    </div>
    @endforeach
  </div>
  </div>
  </head>

  <div class="card-content">

    @foreach ($posts as $post)
    <ul>
        <li>
              <div class="post-content">
    <img src="{{ 'storage/images/' . $post->user->images}}" class=li-icon>
    <div class="li-name">{{ $post->user->username}}</div>
    <div class="li-time">{{ $post->created_at }}</div>
    <div class="li-post">{{ $post->post }}</div>
           </div>
         </li>
     </ul>

    @endforeach
</div>

</body>

@endsection
