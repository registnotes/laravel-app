@extends('layouts.app')

@section('title', 'ツイート一覧')

@section('content')
    <h3>ツイート一覧</h3>

    @if($tweets->count() > 0)
        <div class="list-group">
            @foreach($tweets as $tweet)
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
                </div>
            @endforeach
        </div>

        <!-- ページネーション -->
        <div class="mt-4">
            {{ $tweets->links() }}
        </div>
    @else
        <p>まだツイートがありません。</p>
    @endif
@endsection
