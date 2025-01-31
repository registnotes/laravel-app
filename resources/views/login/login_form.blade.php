<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインフォーム</title>
    <!-- BootstrapのCDNを使ってシンプルにデザイン -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ0h7WbUu9I3QGnAjdD2H15FdcXlWz6ByuRzD1zMmxw8mXoa6z5kS3vP+eMn" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f2f5;
        }
        .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-signin h1 {
            font-size: 26px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.25);
        }
        .btn-block {
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            padding: 12px;
            background-color: #007bff;
            border: none;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-block:hover {
            background-color: #0056b3;
        }
        .alert {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .form-signin .form-label {
            font-size: 14px;
            color: #555;
        }
        .forgot-password {
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
        }
        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf <!-- CSRF保護 -->
        <h1>ログインフォーム</h1>

        <!-- エラーメッセージの表示 -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('login_error'))
            <div class="alert alert-danger">
                {{ session('login_error') }}
            </div>
        @endif

        <div class="mb-3">
            <label for="inputEmail" class="form-label">メールアドレス</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="メールアドレスを入力" required autofocus value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="inputPassword" class="form-label">パスワード</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="パスワードを入力" required>
        </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit">ログイン</button>

        <div class="forgot-password">
            <a href="#">パスワードをお忘れですか？</a>
        </div>
    </form>

    <!-- BootstrapのJSファイル（オプション） -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0KtvxxP1ZYvbbNdrhDfa9zJ9HgGTl4zvj1VvQePR1uFukcJ4" crossorigin="anonymous"></script>
</body>
</html>
