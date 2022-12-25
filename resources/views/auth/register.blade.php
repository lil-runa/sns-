@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register' ]) !!}
<div class="form-register">
<h2>新規ユーザー登録</h2>
<div class="register-area">
{{ Form::label('user name') }}
{{ Form::text('username',null,['class' => 'input'])}}
@if ($errors->has('username'))
    @foreach($errors->get('username') as $error)
    {{'※2文字以上12文字以内'}}<br>
    @endforeach
@endif
</div>
<div class="register-area">
{{ Form::label('mail adress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@if ($errors->has('mail'))
    @foreach($errors->get('mail') as $error)
    {{'※正しくありません'}}<br>
    @endforeach
@endif
</div>
<div class="register-area">
{{ Form::label('password') }}
{{ Form::password('password',null,['class' => 'input']) }}
@if ($errors->has('password'))
    @foreach($errors->get('password') as $error)
    {{'※英数字のみ　8から20字'}}<br>
    @endforeach
@endif
</div>
<div class="register-area">
{{ Form::label('password confirm') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}
</div>

{{ Form::submit('REGISTER',['class'=>'register']) }}
<p><a href="/login" class="a-login">ログイン画面へ戻る</a></p>
@csrf
</div>
{!! Form::close() !!}


@endsection
