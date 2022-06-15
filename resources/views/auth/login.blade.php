@extends('layouts.logout')

@section('content')

{!! Form::open(['action' => 'Auth\LoginController@login' , 'method' => 'post']) !!}


<p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>
@csrf

{!! Form::close() !!}

@endsection
