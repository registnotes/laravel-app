@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $user->user_name }}のフォローしている人</h3>

    @if($following->count() > 0)
        <div class="users">
            @foreach($following as $follow)
                @include('layouts.user', ['user' => $follow->followingUser])
            @endforeach
        </div>

        <!-- ページネーション -->
        <div class="mt-4">
            {{ $following->links() }}
        </div>
    @else
        <p>フォローしている人はいません。</p>
    @endif
</div>
@endsection
