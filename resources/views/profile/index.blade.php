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

    <!-- ユーザーの投稿（ツイート）一覧 -->
    <div class="mt-4">
        <h4>ツイート</h4>
        @foreach($tweets as $tweet)
            <div class="card mb-3">
                <div class="card-body">
                    <p>{{ $tweet->tweet_content }}</p>
                    <small class="text-muted">投稿日: {{ $tweet->created_at->format('Y-m-d H:i') }}</small>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
