@extends('layouts.login')

@section('content')
<div class="profile-edit">
   {!! Form::open(['route' => ['profile_edit'], 'method' => 'PUT','files' => true]) !!}
            {!! Form::hidden('id',$user->id) !!}
                <div class="form-profile up1">
                    {{Form::label('username')}}
                    {{Form::text('username', $user->username, ['class' => 'form-profileEdit', 'id' =>'username'])}}
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
                <div class="form-profile up2">
                    {{Form::label('mail','mail address')}}
                    {{Form::email('mail', $user->mail, ['class' => 'form-profileEdit', 'id' =>'mail'])}}
                    <span class="text-danger">{{$errors->first('email')}}</span>
                </div>
                <div class="form-profile up3">
                    {{Form::label('password','password')}}
                    {{Form::text('password', $user->password, ['class' => 'form-profileEdit', 'id' =>'password'])}}
                    <span class="text-danger">{{$errors->first('password')}}</span>
                </div>
                <div class="form-profile up4">
                    {{Form::label('password_confirmation','password confirm')}}
                    {{Form::text('password_confirmation', $user->password, ['class' => 'form-profileEdit', 'id' =>'password_confirm'])}}
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
