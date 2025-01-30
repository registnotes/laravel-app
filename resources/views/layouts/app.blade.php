<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container-fluid {
            max-width: 1200px; /* 必要に応じて調整 */
            margin: 0 auto;
        }
        .sidebar {
            height: 100vh;
            position: sticky;
            top: 0;
        }
        .left-sidebar {
            width: 250px;
            transition: width 0.3s ease-in-out;
            padding: 10px;
        }
        .left-sidebar ul {
            padding-left: 0;
            list-style: none;
        }
        .left-sidebar ul li {
            margin-bottom: 10px;
        }
        .left-sidebar ul li a {
            display: flex;
            align-items: center;
            padding: 10px;
            text-decoration: none;
            color: black;
            border-radius: 8px;
        }
        .left-sidebar ul li a:hover {
            background-color: #f0f0f0;
        }
        .left-sidebar ul li a img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }
        .tweet-button {
            width: 100%;
            padding: 10px;
            text-align: center;
        }
        .tweet-button img {
            width: 40px;
            height: 40px;
        }
        .main-content {
            flex-grow: 1;
            max-width: 600px;
            margin: 0;
            padding-top: 0;
        }
        /* h1 の文字サイズを少し小さく */
        .main-content h1 {
            margin-top: 0;
            padding-top: 0;
            font-size: 1.4rem; /* 文字サイズを少し小さく */
        }
        .right-sidebar {
            width: 250px;
        }

        /* 画面幅が狭くなった時の調整 */
        @media (max-width: 992px) {
            .right-sidebar {
                display: none;
            }
            .left-sidebar {
                width: 80px;
                padding: 5px;
            }
            .left-sidebar ul li a {
                justify-content: center;
                text-align: center;
            }
            .left-sidebar ul li a img {
                margin-right: 0;
            }
            .left-sidebar ul li a span {
                display: none; /* テキストを非表示 */
            }
            .account-info {
                justify-content: center;
                align-items: center; /* アイコンと中央揃え */
            }
            .account-info .account-details .account-id {
                font-size: 0.8rem; /* アカウントIDの文字を小さく */
                display: none; /* レスポンシブ時にアカウントIDを非表示 */
            }
            .account-info .account-details .account-name {
                display: none; /* アカウント名のテキストを非表示 */
            }
            .tweet-button {
                text-align: center;
            }
            .tweet-button img {
                display: block;
                margin: auto;
            }
            .main-content {
                max-width: 100%;
            }
        }

        /* アカウント情報 */
        .account-info {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .account-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .account-info .account-details {
            flex-grow: 1;
            margin-left: 10px;
        }
        .account-info .account-details span {
            display: block;
        }
        .account-info .account-details .account-name {
            font-weight: bold;
        }

        /* 共通のホバースタイル */
        .dm-link {
            display: block;
            text-decoration: none; /* リンクの下線を消す */
            color: inherit; /* 文字色は親要素から継承 */
        }

        .dm-link:hover .dm {
            background-color: #f8f9fa; /* ホバー時の背景色 */
            cursor: pointer; /* カーソルをポインターに変更 */
        }

        .dm-link:hover .dm strong,
        .dm-link:hover .dm .text-muted {
            color: #007bff; /* ホバー時に文字色を青に変更 */
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- 左カラム -->
            <nav class="col-md-3 col-2 bg-light sidebar left-sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <img src="{{ asset('img/home.png') }}" alt="ホーム">
                            <span>ホーム</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('search') }}">
                            <img src="{{ asset('img/search.png') }}" alt="検索">
                            <span>検索</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dm') }}">
                            <img src="{{ asset('img/dm.png') }}" alt="DM">
                            <span>DM</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">
                            <img src="{{ asset('img/profile.png') }}" alt="プロフィール">
                            <span>プロフィール</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('more') }}">
                            <img src="{{ asset('img/more.png') }}" alt="もっと見る">
                            <span>もっと見る</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tweet-button" href="{{ route('tweet') }}">
                            <button class="btn btn-primary w-100 d-md-block d-none">ツイート</button>
                            <img src="{{ asset('img/tweet.png') }}" class="d-md-none d-block" alt="ツイート">
                        </a>
                    </li>
                    <!-- アカウント変更 -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('change') }}">
                            <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" alt="アカウント変更">
                            <span>アカウント変更</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- 中央カラム -->
            <main class="col-md-6 col-10 main-content">
                <div class="p-3">
                    <h1>@yield('title')</h1>
                    @yield('content')
                </div>
            </main>

            <!-- 右カラム -->
            <aside class="col-md-3 bg-light sidebar right-sidebar">
                <div class="p-3">
                    <h5>おすすめユーザー</h5>
                    <ul>
                        <li>ユーザー1</li>
                        <li>ユーザー2</li>
                    </ul>
                    <h5>人気のポスト</h5>
                    <ul>
                        <li>ポスト1</li>
                        <li>ポスト2</li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</body>
</html>
