@extends('layouts.login')

@section('content')
<div class="profile-edit">
    <img src="{{ asset('storage/images/' . Auth::user()->images) }}" class="profile-icon">
   {!! Form::open(['route' => ['profile_edit'], 'method' => 'PUT','files' => true]) !!}
            {!! Form::hidden('id',$user->id) !!}
                <div class="form-profile">
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
                <div class="form-profile">
                    <div class="form-profile-group">
                    {{Form::label('mail address')}}
                    {{Form::email('mail', $user->mail, ['class' => 'form-profileEdit', 'id' =>'mail'])}}
                    </div>
                    <span class="text-danger">
                        @if ($errors->has('mail'))
                        @foreach($errors->get('mail') as $error)
                        {{'※正しくありません'}}<br>
                        @endforeach
                        @endif
                    </span>
                </div>
                <div class="form-profile">
                    <div class="form-profile-group">
                    {{Form::label('password')}}
                    {{Form::password('password', ['class' => 'form-profileEdit', 'id' =>'password'])}}
                    </div>
                    <span class="text-danger">
                        @if ($errors->has('password'))
                        @foreach($errors->get('password') as $error)
                        {{'※英数字のみ　8から20字'}}<br>
                        @endforeach
                        @endif
                    </span>
                </div>
                <div class="form-profile">
                    <div class="form-profile-group">
                    {{Form::label('password confirm')}}
                    {{Form::password('password_confirmation', ['class' => 'form-profileEdit', 'id' =>'password_confirm'])}}
                    </div>
                    <span class="text-danger">
                        @if ($errors->has('password'))
                        @foreach($errors->get('password') as $error)
                        {{'※英数字のみ　8から20字'}}<br>
                        @endforeach
                        @endif</span>
                </div>
                 <div class="form-profile">
                    <div class="form-profile-group">
                    {{Form::label('bio','bio')}}
                    {{Form::text('bio', $user->bio, ['class' => 'form-profileEdit', 'id' =>'bio'])}}
                    </div>
                    <span class="text-danger">
                        @if ($errors->has('bio'))
                        @foreach($errors->get('bio') as $error)
                        {{'※150字以内'}}<br>
                        @endforeach
                        @endif
                    </span>
                </div>
                <div class="form-profile">
                    <div class="form-profile-group">
                    {{Form::label('icon')}}
                    <div class="form-profile-group2">
                    <label class="file">
                    {{Form::file('icon', ['class' => 'form-profileEdit', 'id' =>'image'])}}
                    ファイルを選択
                    </label>
                    </div>
                    </div>
                </div>
                <div class="form-group pull-right">
                    {{Form::submit(' 更新 ', ['class'=>'btn-pEdit'])}}
                </div>

            {!! Form::close() !!}
</div>



@endsection
