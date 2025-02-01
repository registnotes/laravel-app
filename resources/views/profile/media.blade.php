@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $user->user_name }} の画像付きツイート</h3>

    @if($mediaTweets->count() > 0)
        <div class="list-group">
            @foreach($mediaTweets as $tweet)
                @include('layouts.tweet', ['tweet' => $tweet])
            @endforeach
        </div>

        <!-- ページネーション -->
        <div class="mt-4">
            {{ $mediaTweets->links() }}
        </div>
    @else
        <p>{{ $user->user_name }} の画像付きツイートはありません。</p>
    @endif
</div>
@endsection
