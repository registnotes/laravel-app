<!-- resources/views/layouts/tweet.blade.php -->
<div class="list-group-item">
    <div class="d-flex">
        <!-- アイコン画像 -->
        <img src="{{ asset($tweet->user->profile_image_url) }}" alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
        
        <div class="ms-2">
            <!-- ユーザー名とID -->
            <h5 class="mb-0">
                <a href="{{ route('profile.index', ['user_id' => $tweet->user_id]) }}">
                    {{ $tweet->user->user_name ?? '不明なユーザー' }}
                </a>
                <small class="text-muted"> ({{ $tweet->user->user_id }})</small>
            </h5>
            <!-- 投稿時間 -->
            <small class="text-muted">{{ $tweet->created_at->diffForHumans() }}</small>
        </div>
    </div>

    <!-- ツイート本文 -->
    <p class="mb-1">{{ $tweet->tweet_content }}</p>

    <!-- 画像がある場合に表示 -->
    @if($tweet->tweet_image_path)
        <img src="{{ Storage::url($tweet->tweet_image_path) }}" alt="Tweet Image" class="img-fluid mt-2" style="max-width: 200px; height: auto;">
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
</div>
