@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $user->user_name }}のフォロワー</h3>

    @if($followers->count() > 0)
        <ul>
            @foreach($followers as $follower)
                <li>
                    <a href="{{ route('profile.index', $follower->followerUser->user_id) }}">
                        {{ $follower->followerUser->user_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>フォロワーはいません。</p>
    @endif
</div>
@endsection
