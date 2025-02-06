<!-- resources/views/layouts/tweet.blade.php -->
<div class="list-group-item">
    <div class="d-flex">
        <!-- アイコン画像 -->
        <img src="{{ asset($tweet->user->profile_image_url) }}" alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
        
        <div class="ms-2">
            <!-- ユーザー名とID -->
            <h6 class="mb-1">
                <a href="{{ route('profile.index', ['user_id' => $tweet->user_id]) }}">
                    {{ $tweet->user->user_name ?? '不明なユーザー' }}
                </a>
                <small class="text-muted"> ({{ $tweet->user->user_id }})</small>
                <!-- 投稿時間 -->
                <small class="text-muted">{{ $tweet->created_at->diffForHumans() }}</small>
            </h6>

            <!-- ツイート本文 -->
            <p class="mb-0">{{ $tweet->tweet_content }}</p>

            <!-- 画像がある場合に表示 -->
            @if($tweet->tweet_image_path)
                <img src="{{ asset($tweet->tweet_image_path) }}" alt="Tweet Image" class="img-fluid mt-2" style="max-width: 200px; height: auto;">
            @endif

            <!-- いいねボタンといいね数 -->
            <div class="d-flex align-items-center mt-2">
                <form action="{{ route('tweet.like', $tweet->tweet_id) }}" method="POST" class="me-2">
                    @csrf
                    <button type="submit" class="btn btn-sm p-0" style="border: none; background: none;">
                        <img src="{{ $tweet->likes()->where('user_id', auth()->user()->user_id)->exists() ? asset('storage/images/heart_filled.png') : asset('storage/images/heart_outline.png') }}" alt="Like Button" style="width: 15px; height: 15px;">
                        <small>{{ $tweet->likes->count() }}</small>


                    </button>
                </form>
            </div>
            
        </div>
    </div>

    
</div>
