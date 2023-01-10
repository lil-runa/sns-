@extends('layouts.logout')

@section('content')

<div id="clear">
<span class="navbar-text">{{ Session::get('username') }}さん</span>
  <p class="welcome-atlas">ようこそ！AtlasSNSへ</p>
  <p class="completion">ユーザー登録が完了しました。</p>
  <p class="completion">早速ログインをしてみましょう。</p>

<p class="btn loginScreen"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
