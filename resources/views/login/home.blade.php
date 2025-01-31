<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ0h7WbUu9I3QGnAjdD2H15FdcXlWz6ByuRzD1zMmxw8mXoa6z5kS3vP+eMn" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="mt-5">
            @if (session('login_success'))
                <div class="alert alert-success">
                    {{ session('login_success') }}
                </div>
            @endif
            <h3>プロフィール</h3>

            @if(Auth::check()) {{-- ユーザーがログインしている場合 --}}
                <ul>
                    <li>名前：{{ Auth::user()->user_name }}</li>
                    <li>メールアドレス：{{ Auth::user()->email }}</li>
                </ul>
            @else {{-- ログインしていない場合 --}}
                <p>ログインしていないため、プロフィール情報を表示できません。</p>
            @endif
        </div>
    </div>
</body>
</html>