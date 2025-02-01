@extends('layouts.app')

@section('content')
<div class="content">
    <h2>ユーザー検索</h2>

    <!-- 検索フォーム -->
    <form method="GET" action="{{ route('search.user') }}">
        <div class="mb-3">
            <label for="user_search">ユーザー検索（名前・ID・自己紹介文）</label>
            <input type="text" id="user_search" name="user_search" class="form-control" value="{{ request('user_search') }}" placeholder="ユーザー名・ID・自己紹介文で検索">
        </div>

        <div class="mb-3">
            <label for="sort">並び順</label>
            <select id="sort" name="sort" class="form-control">
                <option value="followers" {{ request('sort') == 'followers' ? 'selected' : '' }}>フォロワー数順</option>
                <option value="posts" {{ request('sort') == 'posts' ? 'selected' : '' }}>投稿数順</option>
                <option value="joined" {{ request('sort') == 'joined' ? 'selected' : '' }}>登録日順</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">検索</button>
    </form>

    <hr>

    <!-- 検索結果 -->
    @if ($users->count() > 0)
        <div class="list-group">
            @foreach ($users as $user)
                @include('layouts.user', ['user' => $user])
            @endforeach
        </div>

        <!-- ページネーション -->
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    @else
        <p>検索結果がありません。</p>
    @endif
</div>
@endsection
