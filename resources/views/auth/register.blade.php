@extends('layouts.logout')

@section('content')

{!! Form::open(['action' => 'Auth\RegisterController@register' ]) !!}

<h2>新規ユーザー登録</h2>
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input'])}}
@if ($errors->has('username'))
    @foreach($errors->get('username') as $error)
    {{'※2文字以上12文字以内'}}<br>
    @endforeach
@endif

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@if ($errors->has('mail'))
    @foreach($errors->get('mail') as $error)
    {{'※正しくありません'}}<br>
    @endforeach
@endif

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}
@if ($errors->has('password'))
    @foreach($errors->get('password') as $error)
    {{'※英数字のみ　8から20字'}}<br>
    @endforeach
@endif

{{ Form::label('パスワード確認') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}


{{ Form::submit('登録') }}
<p><a href="/login">ログイン画面へ戻る</a></p>
@csrf
{!! Form::close() !!}


@endsection
