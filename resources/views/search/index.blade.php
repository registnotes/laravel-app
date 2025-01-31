@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ツイート検索</h2>

    <!-- 検索フォーム -->
    <form method="GET" action="{{ route('search.index') }}">
        <div class="mb-3">
            <label for="keyword">キーワード検索</label>
            <input type="text" id="keyword" name="keyword" class="form-control" value="{{ request('keyword') }}" placeholder="ツイート内容で検索">
        </div>
        
        <div class="mb-3">
            <label for="user_search">ユーザー検索（名前・ID・自己紹介文）</label>
            <input type="text" id="user_search" name="user_search" class="form-control" value="{{ request('user_search') }}" placeholder="ユーザー名・ID・自己紹介文で検索">
        </div>

        <div class="mb-3">
            <label for="sort">並び順</label>
            <select id="sort" name="sort" class="form-control">
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>最新のツイート</option>
                <option value="likes" {{ request('sort') == 'likes' ? 'selected' : '' }}>いいね数の多い順</option>
            </select>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" id="image" name="image" value="true" class="form-check-input" {{ request('image') == 'true' ? 'checked' : '' }}>
            <label class="form-check-label" for="image">画像付きのツイートのみ表示</label>
        </div>

        <button type="submit" class="btn btn-primary">検索</button>
    </form>

    <hr>

    <!-- 検索結果 -->
    @if ($tweets->count() > 0)
        <div class="tweets">
            @foreach ($tweets as $tweet)
            <div class="tweet border p-3 mb-3">
                <p>
                    <strong>
                        <a href="{{ route('profile.index', ['user_id' => $tweet->user_id]) }}">
                            {{ $tweet->user->user_name ?? '不明なユーザー' }}
                        </a>
                    </strong> ({{ $tweet->user->user_id ?? '不明' }})
                </p>
                <p>{{ $tweet->tweet_content }}</p>

                @if ($tweet->tweet_image_path)
                    <img src="{{ Storage::url($tweet->tweet_image_path) }}" alt="画像" class="img-fluid" style="max-width: 200px;">
                @endif

                <!-- いいねボタン -->
                <form action="{{ route('tweet.like', $tweet->tweet_id) }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-sm {{ $tweet->likes()->where('user_id', auth()->user()->user_id)->exists() ? 'btn-danger' : 'btn-outline-primary' }}">
                        {{ $tweet->likes()->where('user_id', auth()->user()->user_id)->exists() ? 'いいね解除' : 'いいね' }}
                    </button>
                </form>

                <!-- いいね数の表示 -->
                <small>{{ $tweet->likes->count() }} いいね</small>

                <hr>
            </div>
            @endforeach
        </div>

        <!-- ページネーション -->
        <div class="mt-4">
            {{ $tweets->links() }}
        </div>
    @else
        <p>検索結果がありません。</p>
    @endif
</div>
@endsection
