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
                <img src="{{ asset($tweet->tweet_image_path) }}" alt="Tweet Image" class="img-fluid mt-2" style="width: 100vw; height: auto; border-radius: 10px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal{{ $tweet->tweet_id }}">
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

<!-- モーダル -->
<div class="modal fade" id="imageModal{{ $tweet->tweet_id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $tweet->tweet_id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- ツイート情報 -->
        <div class="mb-0">
            <div class="d-flex align-items-center mb-2">
                <img src="{{ asset($tweet->user->profile_image_url) }}" alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                <div class="ms-2">
                    <h6 class="mb-1">
                        <a href="{{ route('profile.index', ['user_id' => $tweet->user_id]) }}">
                            {{ $tweet->user->user_name ?? '不明なユーザー' }}
                        </a>
                        <small class="text-muted"> ({{ $tweet->user->user_id }})</small>
                    </h6>
                    <small class="text-muted">{{ $tweet->created_at->diffForHumans() }}</small>
                </div>
            </div>
            <p class="mb-2">{{ $tweet->tweet_content }}</p>
        </div>
        <!-- モーダル内にもいいねボタンといいね数 -->
        <div class="d-flex align-items-center mb-3">
            <form action="{{ route('tweet.like', $tweet->tweet_id) }}" method="POST" class="me-2">
                @csrf
                <button type="submit" class="btn btn-sm p-0" style="border: none; background: none;">
                    <img src="{{ $tweet->likes()->where('user_id', auth()->user()->user_id)->exists() ? asset('storage/images/heart_filled.png') : asset('storage/images/heart_outline.png') }}" alt="Like Button" style="width: 15px; height: 15px;">
                    <small>{{ $tweet->likes->count() }}</small>
                </button>
            </form>
        </div>

        <!-- 拡大画像 -->
        <img src="{{ asset($tweet->tweet_image_path) }}" alt="Tweet Image" class="img-fluid" style="object-fit: contain; max-width: 100%; max-height: 80vh; margin: auto; display: block;">
      </div>
    </div>
  </div>
</div>