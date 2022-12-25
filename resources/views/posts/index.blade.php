@extends('layouts.login')


@section('content')
<body>
  <head>
    <div class="container">
      {!! Form::open(['url' => '/top']) !!}
      @csrf
      @method('POST')
        <div class="form-group">
          <img src="{{ asset('storage/images/' . Auth::user()->images) }}" class="form-icon">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
            @if ($errors->has('post'))
    @foreach($errors->get('post') as $error)
    {{'※1文字以上200文字以内'}}<br>
    @endforeach
@endif
                    <input type="image" class="btn-success pull-right" src="images/post.png" value='送信'></input>
        </div>

        {!! Form::close() !!}
    </div>
    </head>
    <div class="card-body">
      <div class="card-content">

            @foreach ($list as $lists)
            <ul>
                <li>
                  <div class="post-content">
                    <img src="{{ 'storage/images/' . $lists->images}}" class=li-icon>
                  <div class="li-name">{{ $lists->username}}</div>
                  <div class="li-time">{{ $lists->created_at }}</div>
                  <div class="li-post">{{ $lists->post }}</div>
                  </div>
                </li>
            </ul>
            @if ($lists->id == Auth::user()->id)
            <div class="content">
                            <a class="js-modal-open"  post="{{ $lists->post }}" post_id="{{ $lists->id }}"><img src="images/edit.png" class="edit-img"></a>
                            <a class="btn-danger" href="/post/{{ $lists->id }}/top" onclick="return confirm('投稿を削除しますか？')"><img src="images/trash-h.png" class="trash-img"></a>
            </div>
            @endif
            @endforeach
            <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="post/{id}/top" method="POST">
            {{ csrf_field() }}
                <textarea name="upPost" class="modal_post" value=""></textarea>
                <input type="hidden" name="id" class="modal_id" value="PUT">
                <input type="image" src="images/edit.png">
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
                  </div>
                  </div>
</body>

@endsection
