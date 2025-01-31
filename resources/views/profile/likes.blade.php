@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $user->user_name }} がいいねしたツイート</h3>

    @if($likedTweets->count() > 0)
        <div class="list-group">
            @foreach($likedTweets as $tweet)
                <div class="list-group-item">
                    <h5 class="mb-1">
                        <a href="{{ route('profile.index', ['user_id' => $tweet->user_id]) }}">
                            {{ $tweet->user_id }}
                        </a>
                    </h5>
                    <p class="mb-1">{{ $tweet->tweet_content }}</p>

                    <!-- 画像がある場合に表示 -->
                    @if($tweet->tweet_image_path)
                        <img src="{{ Storage::url($tweet->tweet_image_path) }}" alt="Tweet Image" class="img-fluid mt-2" style="max-width: 200px; height: auto;">
                    @endif

                    <small>{{ $tweet->created_at->diffForHumans() }}</small>

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
            @endforeach
        </div>

        <!-- ページネーション -->
        <div class="mt-4">
            {{ $likedTweets->links() }}
        </div>
    @else
        <p>{{ $user->user_name }} はまだいいねしていません。</p>
    @endif
</div>
@endsection
