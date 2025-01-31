@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $user->user_name }} の画像付きツイート</h3>

    @if($tweets->count() > 0)
        <div class="row">
            @foreach($tweets as $tweet)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ Storage::url($tweet->tweet_image_path) }}" alt="Tweet Image" class="card-img-top" style="width: 200px; height: auto;">
                        <div class="card-body">
                            <p class="card-text">{{ $tweet->tweet_content }}</p>
                            <small class="text-muted">投稿日: {{ $tweet->created_at->format('Y-m-d H:i') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>{{ $user->user_name }} の画像付きツイートはありません。</p>
    @endif
</div>
@endsection
