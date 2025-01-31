@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center" style="background-image: url('{{ $user->header_image_url }}'); background-size: cover; height: 200px;">
        </div>
        <div class="card-body text-center">
            <img src="{{ $user->profile_image_url }}" alt="Profile Image" class="rounded-circle" width="100" height="100">
            <h3 class="mt-3">{{ $user->user_name }}</h3>
            <p class="text-muted">{{ $user->user_id }}</p>
            <p>{{ $user->profile_description }}</p>
            <a href="{{ $user->profile_url }}" class="btn btn-primary" target="_blank">{{ $user->profile_url }}</a>
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
    <div class="mt-4">
        <h4>ツイート</h4>
        @foreach($tweets as $tweet)
            <div class="card mb-3">
                <div class="card-body">
                    <p>{{ $tweet->tweet_content }}</p>
                    <!-- 画像がある場合に表示 -->
                    @if($tweet->tweet_image_path)
                        <img src="{{ Storage::url($tweet->tweet_image_path) }}" alt="Tweet Image" class="img-fluid mt-2" style="max-width: 200px; height: auto;">
                    @endif
                    <small class="text-muted">投稿日: {{ $tweet->created_at->format('Y-m-d H:i') }}</small>

                    <!-- いいねボタン -->
                    <form action="{{ route('tweet.like', $tweet->tweet_id) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            @if($tweet->likes()->where('user_id', auth()->user()->user_id)->exists())
                                いいね解除
                            @else
                                いいね
                            @endif
                        </button>
                    </form>

                    <!-- いいね数の表示 -->
                    <small>{{ $tweet->likes->count() }} いいね</small>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
