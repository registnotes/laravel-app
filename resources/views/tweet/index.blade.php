@extends('layouts.app')

@section('title', 'ツイート一覧')

@section('content')
    <h3>ツイート一覧</h3>

    @if($tweets->count() > 0)
        <div class="list-group">
            @foreach($tweets as $tweet)
                @include('layouts.tweet', ['tweet' => $tweet])
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
