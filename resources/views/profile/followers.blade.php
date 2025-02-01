@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $user->user_name }}のフォロワー</h3>

    @if($followers->count() > 0)
        <div class="users">
            @foreach($followers as $follower)
                @include('layouts.user', ['user' => $follower->followerUser])
            @endforeach
        </div>

        <!-- ページネーション -->
        <div class="mt-4">
            {{ $followers->links() }}
        </div>
    @else
        <p>フォロワーはいません。</p>
    @endif
</div>
@endsection
