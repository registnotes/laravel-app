<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f2f5;
        }
        .form-register {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-register h1 {
            font-size: 26px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            padding: 10px;
        }
        .btn-block {
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            padding: 12px;
        }
    </style>
</head>
<body>
    <form class="form-register" method="POST" action="{{ route('register') }}">
        @csrf
        <h1>ユーザー登録</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="user_id" class="form-label">ユーザーID</label>
            <input type="text" id="user_id" name="user_id" class="form-control" placeholder="ユーザーIDを入力" required value="{{ old('user_id') }}">
        </div>

        <div class="mb-3">
            <label for="user_name" class="form-label">ユーザー名</label>
            <input type="text" id="user_name" name="user_name" class="form-control" placeholder="ユーザー名を入力" required value="{{ old('user_name') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="メールアドレスを入力" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="パスワードを入力" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">パスワード確認</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="もう一度パスワードを入力" required>
        </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit">登録</button>
    </form>
</body>
</html>
