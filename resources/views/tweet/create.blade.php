@extends('layouts.app')

@section('title', 'ツイート投稿')

@section('content')
    <h3>ツイート投稿</h3>

    @if(Auth::check())
        <!-- ツイート投稿フォーム -->
        <form action="{{ route('tweet.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="tweetContent" class="form-label">ツイート内容</label>
                <textarea id="tweet_content" name="tweet_content" class="form-control" rows="3" placeholder="ここにツイートを入力してください"></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">画像</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">ツイートする</button>
        </form>
    @else
        <p>ログインしていないとツイートできません。ログインしてください。</p>
    @endif
@endsection
