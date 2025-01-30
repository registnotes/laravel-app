@extends('layouts.app')

@section('title', '検索')

@section('content')
    <div class="container">
        <!-- 検索バー -->
        <div class="mb-4">
            <input type="text" class="form-control" placeholder="検索..." aria-label="検索">
        </div>

        <!-- タブ -->
        <ul class="nav nav-tabs" id="searchTabs" role="tablist">
            <li class="nav-item" role="presentation" style="width: 25%;">
                <a class="nav-link active text-center" id="trending-tab" data-bs-toggle="tab" href="#trending" role="tab" aria-controls="trending" aria-selected="true">話題のツイート</a>
            </li>
            <li class="nav-item" role="presentation" style="width: 25%;">
                <a class="nav-link text-center" id="latest-tab" data-bs-toggle="tab" href="#latest" role="tab" aria-controls="latest" aria-selected="false">最新</a>
            </li>
            <li class="nav-item" role="presentation" style="width: 25%;">
                <a class="nav-link text-center" id="accounts-tab" data-bs-toggle="tab" href="#accounts" role="tab" aria-controls="accounts" aria-selected="false">アカウント</a>
            </li>
            <li class="nav-item" role="presentation" style="width: 25%;">
                <a class="nav-link text-center" id="media-tab" data-bs-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false">メディア</a>
            </li>
        </ul>

        <!-- タブ内容 -->
        <div class="tab-content mt-3" id="searchTabsContent">
            <!-- 話題のツイートタブ -->
            <div class="tab-pane fade show active" id="trending" role="tabpanel" aria-labelledby="trending-tab">
                <!-- ツイート1 -->
                <a href="{{ route('messages') }}" class="tweet" style="text-decoration: none; color: inherit;">
                    <div style="border: 1px solid #ccc; border-radius: 8px; padding: 15px; margin-bottom: 0;">
                        <div class="d-flex mb-3">
                            <!-- アイコンの横幅を30%に設定 -->
                            <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" class="rounded-circle" alt="User Icon" style="width: 50px; height: 50px; flex-shrink: 0;">
                            
                            <!-- ツイート内容の横幅を残りの70%に設定 -->
                            <div class="ms-3" style="flex-grow: 1; width: 70%;">
                                <strong>ユーザー名</strong> 
                                <span class="text-muted" style="font-size: 0.85rem;">@ユーザーID</span> 
                                <span class="text-muted" style="font-size: 1rem;">・ 1時間前</span> <!-- 投稿時間を少し大きくしました -->
                                <p style="display: block; width: 100%;">話題のツイート本文。ツイート本文ツイート本文ツイート本文ツイート本文ツイート本文ツイート本文ツイート本文ツイート本文ツイート本文ツイート本文ツイート本文ツイート本文ツイート本文ツイート本文ツイート本文ツイート本文</p>
                                <div class="d-flex" style="justify-content: space-between;">
                                    <!-- リプライ、リツイート、いいねを1/3ずつ分割 -->
                                    <div style="width: 33%;" class="d-flex justify-content-start align-items-center">
                                        <img src="{{ asset('img/reply.png') }}" alt="Comment Icon" style="width: 20px; height: 20px;">
                                        <span class="ms-2" style="font-size: 0.85rem; color: #6c757d;">15</span>
                                    </div>
                                    <div style="width: 33%;" class="d-flex justify-content-start align-items-center">
                                        <img src="{{ asset('img/retweet.png') }}" alt="Retweet Icon" style="width: 20px; height: 20px;">
                                        <span class="ms-2" style="font-size: 0.85rem; color: #6c757d;">7</span>
                                    </div>
                                    <div style="width: 33%;" class="d-flex justify-content-start align-items-center">
                                        <img src="{{ asset('img/fav.png') }}" alt="Like Icon" style="width: 20px; height: 20px;">
                                        <span class="ms-2" style="font-size: 0.85rem; color: #6c757d;">25</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- ツイート2 -->
                <a href="{{ route('messages') }}" class="tweet" style="text-decoration: none; color: inherit;">
                    <div style="border: 1px solid #ccc; border-radius: 8px; padding: 15px; margin-bottom: 0;">
                        <div class="d-flex mb-3">
                            <!-- アイコンの横幅を30%に設定 -->
                            <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" class="rounded-circle" alt="User Icon" style="width: 50px; height: 50px; flex-shrink: 0;">
                            
                            <!-- ツイート内容の横幅を残りの70%に設定 -->
                            <div class="ms-3" style="flex-grow: 1; width: 70%;">
                                <strong>ユーザー名</strong> 
                                <span class="text-muted" style="font-size: 0.85rem;">@ユーザーID</span> 
                                <span class="text-muted" style="font-size: 1rem;">・ 3時間前</span> <!-- 投稿時間を少し大きくしました -->
                                <p style="display: block; width: 100%;">こちらは追加のサンプルツイートです。テキストは適切に分けて表示されます。</p>
                                <div class="d-flex" style="justify-content: space-between;">
                                    <!-- リプライ、リツイート、いいねを1/3ずつ分割 -->
                                    <div style="width: 33%;" class="d-flex justify-content-start align-items-center">
                                        <img src="{{ asset('img/reply.png') }}" alt="Comment Icon" style="width: 20px; height: 20px;">
                                        <span class="ms-2" style="font-size: 0.85rem; color: #6c757d;">8</span>
                                    </div>
                                    <div style="width: 33%;" class="d-flex justify-content-start align-items-center">
                                        <img src="{{ asset('img/retweet.png') }}" alt="Retweet Icon" style="width: 20px; height: 20px;">
                                        <span class="ms-2" style="font-size: 0.85rem; color: #6c757d;">4</span>
                                    </div>
                                    <div style="width: 33%;" class="d-flex justify-content-start align-items-center">
                                        <img src="{{ asset('img/fav.png') }}" alt="Like Icon" style="width: 20px; height: 20px;">
                                        <span class="ms-2" style="font-size: 0.85rem; color: #6c757d;">12</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- その他のタブは省略 -->
        </div>
    </div>
@endsection

<style>
    /* ツイートホバー時の背景色とアニメーション設定 */
    .tweet:hover {
        background-color: #f8f9fa; /* 背景色を変更 */
    }
</style>

