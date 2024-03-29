<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="http://127.0.0.1:8000/top" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header class="header">
        <h1><a href="/top" class=atlas><img src="{{asset('/images/atlas.png')}}" class=atlas-icon></a></h1>
                <div  class=accordion class="accordion-container">
                    <h4 class="accordion-title js-accordion-title"><p class=username>{{ Auth::user()->username }}さん</p></h4>
                    <div class=accordion-content>
                        <ul>
                            <li class=home><a href="/top">HOME</a></li>
                            <li class=profile><a href="/profile">プロフィール編集</a></li>
                            <li class=logout><a href="/logout">ログアウト</a></li>
                        </ul>
                    </div>
                </div>
                <img src="{{ asset('storage/images/' . Auth::user()->images) }}" class="user-icon">
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="side-username">{{ Auth::user()->username }}さんの</p>
                <div class="follow-count">
                <p >フォロー数</p>
                <p>{{Auth::user()->follows->count()}}名</p>
                </div>
                <p class="btn follow-list"><a href="/follow-list">フォローリスト</a></p>
                <div class="follower-count">
                <p>フォロワー数</p>
                <p>{{Auth::user()->followers->count()}}名</p>
                </div>
                <p class="btn follower-list"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn search"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>
