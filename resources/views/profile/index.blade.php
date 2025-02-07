@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <p class="card-header text-center" style="background-image: url('{{ asset($user->header_image_url) }}'); background-size: cover; height: 200px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#headerImageModal">
        </p>
        <div class="card-body text-left">
            <img src="{{ asset($user->profile_image_url) }}" alt="Profile Image" class="rounded-circle" width="100" height="100" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#profileImageModal">
            <div class="d-flex justify-content-between align-items-center mt-2">
                <h4>{{ $user->user_name }}</h4>
                <!-- プロフィール編集ボタン（本人のみ表示） -->
                @if(auth()->user()->user_id == $user->user_id)
                    <a href="{{ route('profile.edit', $user->user_id) }}" class="btn btn-light mt-3" style="border: 1px solid black;">プロフィール編集</a>
                @endif
                <!-- フォロー/アンフォローボタン -->
                @if(auth()->user()->user_id != $user->user_id)
                    @if($isFollowing)
                        <form action="{{ route('unfollow', $user->user_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">アンフォロー</button>
                        </form>
                    @else
                        <form action="{{ route('follow', $user->user_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">フォロー</button>
                        </form>
                    @endif
                @endif
            </div>

            <p class="text-muted">{{ $user->user_id }}</p>
            <p>{{ $user->profile_description }}</p>
            <p><a href="{{ $user->profile_url }}" target="_blank">
            {{ \Illuminate\Support\Str::limit($user->profile_url, 25, '...') }}
            </a></p>
            <p>
                <!-- フォロー・フォロワーのリンク -->
                <a href="{{ route('profile.following', $user->user_id) }}">{{ $followingCount }} フォロー中</a>
                <a href="{{ route('profile.followers', $user->user_id) }}">{{ number_format($followerCount) }} フォロワー</a>
            </p>
        </div>
        


            
        
    </div>

    

    

    <!-- ユーザーの投稿（ツイート）一覧 -->
    <div class="list-group">
        <h4 class="mt-2">ツイート</h4>
        @foreach($tweets as $tweet)
            @include('layouts.tweet', ['tweet' => $tweet])
        @endforeach
    </div>
</div>





<!-- プロフィール画像のモーダル -->
<div class="modal fade" id="profileImageModal" tabindex="-1" aria-labelledby="profileImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset($user->profile_image_url) }}" alt="Profile Image" class="img-fluid rounded-circle" style="max-width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>

<!-- ヘッダー画像のモーダル -->
<div class="modal fade" id="headerImageModal" tabindex="-1" aria-labelledby="headerImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center" style="height: 80vh;">
                <img src="{{ asset($user->header_image_url) }}" alt="Header Image" class="img-fluid d-block mx-auto" style="max-width: 100%; height: auto; object-fit: contain;">
            </div>
        </div>
    </div>
</div>


@endsection
