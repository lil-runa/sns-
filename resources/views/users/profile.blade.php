@extends('layouts.login')

@section('content')
<div class="profile-edit">
   {!! Form::open(['route' => ['profile_edit'], 'method' => 'PUT','files' => true]) !!}
            {!! Form::hidden('id',$user->id) !!}
                <div class="form-profile up1">
                    <div class="form-profile-group">
                    {{Form::label('username')}}
                    {{Form::text('username', $user->username, ['class' => 'form-profileEdit', 'id' =>'username'])}}
                    </div>
                    @if ($errors->has('username'))
                    <span class="text-danger">
                        @foreach($errors->get('username') as $error)
                        {{'※2文字以上12文字以内'}}<br>
                        @endforeach</span>
                        @endif
                </div>
                <div class="form-profile up2">
                    {{Form::label('mail','mail address')}}
                    {{Form::email('mail', $user->mail, ['class' => 'form-profileEdit', 'id' =>'mail'])}}
                    <span class="text-danger">
                        @if ($errors->has('mail'))
                        @foreach($errors->get('mail') as $error)
                        {{'※正しくありません'}}<br>
                        @endforeach
                        @endif
                    </span>
                </div>
                <div class="form-profile up3">
                    {{Form::label('password','password')}}
                    {{Form::text('password',null, ['class' => 'form-profileEdit', 'id' =>'password'])}}
                    <span class="text-danger">
                        @if ($errors->has('password'))
                        @foreach($errors->get('password') as $error)
                        {{'※英数字のみ　8から20字'}}<br>
                        @endforeach
                        @endif
                    </span>
                </div>
                <div class="form-profile up4">
                    {{Form::label('password_confirmation','password confirm')}}
                    {{Form::text('password_confirmation', null, ['class' => 'form-profileEdit', 'id' =>'password_confirm'])}}
                    <span class="text-danger">{{$errors->first('password')}}</span>
                </div>
                 <div class="form-profile up5">
                    {{Form::label('bio','bio')}}
                    {{Form::text('bio', $user->bio, ['class' => 'form-profileEdit', 'id' =>'bio'])}}
                    <span class="text-danger">{{$errors->first('bio')}}</span>
                </div>
                <div class="form-profile up6">
                    {{Form::label('icon')}}
                    {{Form::file('icon',  ['class' => 'form-profileEdit', 'id' =>'image'])}}
                </div>
                <div class="form-group pull-right">
                    {{Form::submit(' 更新する ', ['class'=>'btn pEit'])}}
                </div>

            {!! Form::close() !!}
</div>



@endsection
