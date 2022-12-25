@extends('layouts.logout')

@section('content')

{!! Form::open(['action' => 'Auth\LoginController@login' , 'method' => 'post']) !!}

<div class="form-login">
<p class="welcome">AtlasSNSへようこそ</p>

<div class="login-area">
{{ Form::label('mail adress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div class="login-area">
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
</div>

<div >
{{ Form::submit('LOGIN' ,['class'=>'login']) }}
</div>

<p><a href="/register" class="a-register">新規ユーザーの方はこちら</a></p>
@csrf

{!! Form::close() !!}
</div>
@endsection
