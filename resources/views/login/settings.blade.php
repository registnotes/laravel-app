@extends('layouts.app')

@section('title', '設定')

@section('content')
    <h3>プロフィール設定</h3>

    @auth
        <ul>
            <li>名前：{{ Auth::user()->user_name }}</li>
            <li>ユーザーID：{{ Auth::user()->user_id }}</li>
            <li>メールアドレス：{{ Auth::user()->email }}</li>
        </ul>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">ログアウト</button>
        </form>
    @else
        <p>ログインしていないため、プロフィール情報を表示できません。</p>
    @endauth
@endsection
