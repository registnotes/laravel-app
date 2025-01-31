<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ホーム')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ0h7WbUu9I3QGnAjdD2H15FdcXlWz6ByuRzD1zMmxw8mXoa6z5kS3vP+eMn" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- 左カラム -->
            <div class="col-md-3 bg-light p-3">
                <h4>左カラム</h4>
                <ul class="list-unstyled">
                <li><a href="{{ route('login.home') }}">ホーム</a></li>
                <li><a href="{{ route('tweet.index') }}">タイムライン</a></li>
                <li><a href="{{ route('tweet.create') }}">ツイート</a></li>
                <li><a href="{{ route('profile.index', ['user_id' => auth()->user()->user_id]) }}">プロフィール</a></li>
                <li><a href="#">設定</a></li>
                </ul>
            </div>

            <!-- 中央カラム（メインコンテンツ）-->
            <div class="col-md-6 p-3">
                @yield('content')
            </div>

            <!-- 右カラム -->
            <div class="col-md-3 bg-light p-3">
                <h4>右カラム</h4>
                <ul class="list-unstyled">
                    <li><a href="#">おすすめユーザー</a></li>
                    <li><a href="#">人気ポスト</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0n6g6t0ME6IQ4cT/7Z61q7t8/cp7nP9IY0GZT5KfLTOO2hco" crossorigin="anonymous"></script>
</body>
</html>
