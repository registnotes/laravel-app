@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ツイート検索</h2>

    <!-- 検索フォーム -->
    <form method="GET" action="{{ route('search.tweet') }}">
        <div class="mb-3">
            <label for="keyword">キーワード検索</label>
            <input type="text" id="keyword" name="keyword" class="form-control" value="{{ request('keyword') }}" placeholder="ツイート内容で検索">
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
        <div class="list-group">
            @foreach ($tweets as $tweet)
                @include('layouts.tweet', ['tweet' => $tweet])
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
