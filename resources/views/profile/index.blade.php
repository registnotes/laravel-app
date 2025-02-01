@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center" style="background-image: url('{{ asset($user->header_image_url) }}'); background-size: cover; height: 200px;">
        </div>
        <div class="card-body text-center">
            <img src="{{ asset($user->profile_image_url) }}" alt="Profile Image" class="rounded-circle" width="100" height="100">
            <h3 class="mt-3">{{ $user->user_name }}</h3>
            <p class="text-muted">{{ $user->user_id }}</p>
            <p>{{ $user->profile_description }}</p>
            <a href="{{ $user->profile_url }}" class="btn btn-primary" target="_blank">{{ $user->profile_url }}</a>

            <!-- プロフィール編集ボタン（本人のみ表示） -->
            @if(auth()->user()->user_id == $user->user_id)
                <a href="{{ route('profile.edit', $user->user_id) }}" class="btn btn-warning mt-3">プロフィール編集</a>
            @endif
        </div>
    </div>

    <!-- フォロー/アンフォローボタン -->
    @if(auth()->user()->user_id != $user->user_id)
        @if($isFollowing)
            <form action="{{ route('unfollow', $user->user_id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">アンフォロー</button>
            </form>
        @else
            <form action="{{ route('follow', $user->user_id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">フォロー</button>
            </form>
        @endif
    @endif

    <!-- フォロー・フォロワーのリンク -->
    <div class="mt-4">
        <h5>フォロー</h5>
        <a href="{{ route('profile.following', $user->user_id) }}" class="btn btn-link">フォローしている人を見る</a>

        <h5 class="mt-2">フォロワー</h5>
        <a href="{{ route('profile.followers', $user->user_id) }}" class="btn btn-link">フォロワーを見る</a>
    </div>

    <!-- ユーザーの投稿（ツイート）一覧 -->
    <div class="list-group">
        <h4>ツイート</h4>
        @foreach($tweets as $tweet)
            @include('layouts.tweet', ['tweet' => $tweet])
        @endforeach
    </div>
</div>
@endsection
