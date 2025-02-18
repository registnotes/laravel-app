@extends('layouts.app')

@section('title', 'ツイート投稿')

@section('content')


<div class="container">
    <div class="mt-5">
        <x-alert type="success" :session="session('success')"/>
        <h3>プロフィール</h3>

        @if(Auth::check()) {{-- ユーザーがログインしている場合 --}}
            <ul>
                <li>名前：{{ Auth::user()->user_name }}</li>
                <li>メールアドレス：{{ Auth::user()->email }}</li>
            </ul>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger">ログアウト</button>
            </form>
        @else {{-- ログインしていない場合 --}}
            <p>ログインしていないため、プロフィール情報を表示できません。</p>
        @endif
    </div>
</div>


@endsection