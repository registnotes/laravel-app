@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ユーザー登録</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">ユーザーID</label>
            <input type="text" name="user_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="user_name" class="form-label">ユーザー名</label>
            <input type="text" name="user_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
    </form>
</div>
@endsection
