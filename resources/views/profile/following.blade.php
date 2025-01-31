@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $user->user_name }}のフォローしている人</h3>

    @if($following->count() > 0)
        <ul>
            @foreach($following as $follow)
                <li>
                    <a href="{{ route('profile.index', $follow->followingUser->user_id) }}">
                        {{ $follow->followingUser->user_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>フォローしている人はいません。</p>
    @endif
</div>
@endsection
