@extends('layouts.app')

@section('title', 'プロフィール')

@section('content')
    <div class="container">
        <!-- タブ -->
        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
            <li class="nav-item" role="presentation" style="width: 50%;">
                <a class="nav-link active text-center" id="recommended-tab" data-bs-toggle="tab" href="#recommended" role="tab" aria-controls="recommended" aria-selected="true">おすすめ</a>
            </li>
            <li class="nav-item" role="presentation" style="width: 50%;">
                <a class="nav-link text-center" id="following-tab" data-bs-toggle="tab" href="#following" role="tab" aria-controls="following" aria-selected="false">フォロー中</a>
            </li>
        </ul>
        
        <div class="tab-content mt-3" id="profileTabsContent" style="display: flex;">
            <!-- おすすめタブ -->
            <div class="tab-pane fade show active" id="recommended" role="tabpanel" aria-labelledby="recommended-tab" style="width: 100%;">
                <!-- ツイート1 -->
                <a href="{{ route('messages') }}" class="tweet-link" style="text-decoration: none; color: inherit;">
                    <div class="tweet" style="border: 1px solid #ccc; border-radius: 8px; padding: 15px; margin-bottom: 0; transition: background-color 0.3s, transform 0.3s;">
                        <div class="d-flex mb-3">
                            <!-- アイコンの横幅を30%に設定 -->
                            <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" class="rounded-circle" alt="User Icon" style="width: 50px; height: 50px; flex-shrink: 0;">
                            
                            <!-- ツイート内容の横幅を残りの70%に設定 -->
                            <div class="ms-3" style="flex-grow: 1; width: 70%;">
                                <strong>ユーザー名</strong> 
                                <span class="text-muted" style="font-size: 0.85rem;">@ユーザーID</span> 
                                <span class="text-muted" style="font-size: 1rem;">・ 1時間前</span> <!-- 投稿時間を少し大きくしました -->
                                <p style="display: block; width: 100%;">ここにツイート内容が表示されます。ツイートの内容は140文字以内に収めることができますので、簡潔に言いたいことを伝えることが重要です。詳細は後日追記します。</p>
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
                <a href="{{ route('messages') }}" class="tweet-link" style="text-decoration: none; color: inherit;">
                    <div class="tweet" style="border: 1px solid #ccc; border-radius: 8px; padding: 15px; margin-bottom: 0; transition: background-color 0.3s, transform 0.3s;">
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

            <!-- フォロー中タブ -->
            <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="following-tab" style="width: 100%;">
                <div class="tweet" style="border: 1px solid #ccc; border-radius: 8px; padding: 15px; margin-bottom: 0; transition: background-color 0.3s, transform 0.3s;">
                    <div class="d-flex mb-3">
                        <!-- アイコンの横幅を30%に設定 -->
                        <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" class="rounded-circle" alt="User Icon" style="width: 50px; height: 50px; flex-shrink: 0;">
                        
                        <!-- ツイート内容の横幅を残りの70%に設定 -->
                        <div class="ms-3" style="flex-grow: 1; width: 70%;">
                            <strong>フォロー中ユーザー名</strong> 
                            <span class="text-muted" style="font-size: 0.85rem;">@フォロー中ID</span> 
                            <span class="text-muted" style="font-size: 1rem;">・ 2時間前</span> <!-- 投稿時間を少し大きくしました -->
                            <p style="display: block; width: 100%;">フォロー中ユーザーのツイート内容がここに表示されます。こちらも140文字以内に収めて、言いたいことを端的に表現してください。</p>
                            <div class="d-flex" style="justify-content: space-between;">
                                <!-- リプライ、リツイート、いいねを1/3ずつ分割 -->
                                <div style="width: 33%;" class="d-flex justify-content-start align-items-center">
                                    <img src="{{ asset('img/reply.png') }}" alt="Comment Icon" style="width: 20px; height: 20px;">
                                    <span class="ms-2" style="font-size: 0.85rem; color: #6c757d;">13</span>
                                </div>
                                <div style="width: 33%;" class="d-flex justify-content-start align-items-center">
                                    <img src="{{ asset('img/retweet.png') }}" alt="Retweet Icon" style="width: 20px; height: 20px;">
                                    <span class="ms-2" style="font-size: 0.85rem; color: #6c757d;">6</span>
                                </div>
                                <div style="width: 33%;" class="d-flex justify-content-start align-items-center">
                                    <img src="{{ asset('img/fav.png') }}" alt="Like Icon" style="width: 20px; height: 20px;">
                                    <span class="ms-2" style="font-size: 0.85rem; color: #6c757d;">19</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    /* ツイートホバー時の背景色とアニメーション設定 */
    .tweet:hover {
        background-color: #f8f9fa; /* 背景色を変更 */
    }
</style>
