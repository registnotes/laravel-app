@extends('layouts.app')

@section('title', 'アカウント名')

@section('content')
    <!-- プロフィールヘッダー -->
    <div class="profile-header text-center">
        <div class="d-flex justify-content-between">
            <!-- 文字サイズを小さくするためにfont-sizeを調整 -->
            <h4 class="text-muted" style="font-size: 0.9rem;">〇〇件のポスト</h4>
        </div>
        <!-- ヘッダー画像のコンテナ -->
        <div class="header-image-container" style="position: relative; width: 100%; padding-top: 25%; overflow: hidden;">
            <!-- ヘッダー画像を縦横比4:1で表示するためにobject-fitとobject-positionを使用 -->
            <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" class="img-fluid rounded" alt="ヘッダー画像" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; object-position: center center;">
        </div>
    </div>

    <!-- プロフィール画像とプロフィール編集ボタン -->
    <div class="profile-info d-flex justify-content-between align-items-center mt-4">
        <div class="profile-avatar">
            <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" class="rounded-circle" width="100" height="100" alt="アカウントアイコン">
        </div>
        <div class="profile-edit">
            <a href="#" class="btn btn-outline-primary">プロフィールを編集</a>
        </div>
    </div>

    <!-- その他のプロフィール情報 -->
    <div class="profile-details mt-4">
        <h5>アカウント名</h5>
        <p class="text-muted">@アカウントID</p>
        <p>ここに自己紹介文が入ります。</p>
        <p><a href="https://example.com">https://example.com</a></p>
        <p class="text-muted">2024年1月1日からTwitterを利用しています。</p>

        <!-- フォローステータス -->
        <div class="d-flex mt-3">
            <div class="flex-grow-1 text-start">
                <span>1000 フォロー中</span>
            </div>
            <div class="flex-grow-1 text-start">
                <span>4.7万 フォロワー</span>
            </div>
        </div>
    </div>

    <!-- タブ -->
    <ul class="nav nav-tabs mt-4" id="profileTab" role="tablist" style="width: 100%;"> <!-- 100%に変更 -->
        <li class="nav-item" role="presentation" style="flex-grow: 1;">
            <a class="nav-link active text-center" id="posts-tab" data-bs-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">ポスト</a>
        </li>
        <li class="nav-item" role="presentation" style="flex-grow: 1;">
            <a class="nav-link text-center" id="replies-tab" data-bs-toggle="tab" href="#replies" role="tab" aria-controls="replies" aria-selected="false">返信</a>
        </li>
        <li class="nav-item" role="presentation" style="flex-grow: 1;">
            <a class="nav-link text-center" id="media-tab" data-bs-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false">メディア</a>
        </li>
    </ul>

    <div class="tab-content mt-3" id="profileTabContent">
        <!-- ポスト -->
        <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
            <div class="post text-center">
                <p>ポスト内容がここに表示されます。</p>
            </div>
        </div>

        <!-- 返信 -->
        <div class="tab-pane fade" id="replies" role="tabpanel" aria-labelledby="replies-tab">
            <div class="post text-center">
                <p>返信内容がここに表示されます。</p>
            </div>
        </div>

        <!-- メディア -->
        <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
            <div class="media-posts text-center">
                <div class="media-item mb-3">
                    <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" alt="メディア画像" class="img-fluid">
                </div>
                <div class="media-item mb-3">
                    <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" alt="メディア画像" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
