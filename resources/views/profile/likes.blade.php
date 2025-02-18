@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>{{ $user->user_name }} がいいねしたツイート</h3>

    @if($likedTweets->count() > 0)
        <div class="list-group">
            @foreach($likedTweets as $tweet)
                @include('layouts.tweet', ['tweet' => $tweet])
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
