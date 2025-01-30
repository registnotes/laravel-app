@extends('layouts.app')

@section('title', 'DMページ')

@section('content')
    <div class="container">
        <!-- ユーザー情報 -->
        <div class="user-info mb-4 text-center">
            <!-- ユーザーアイコン（上に表示） -->
            <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" class="rounded-circle" alt="User Icon" style="width: 80px; height: 80px;">

            <div class="mt-3">
                <!-- アカウント名 -->
                <strong>ユーザー名</strong>
                <br>
                <!-- ユーザーID -->
                <span class="text-muted" style="font-size: 0.85rem;">@ユーザーID</span>
                <p style="font-size: 0.9rem; color: black;">自己紹介文がここに表示されます。</p>
                <span class="text-muted" style="font-size: 0.85rem;">2022年1月1日からTwitterを利用しています</span>
                <p style="font-size: 0.85rem; color: #6c757d;">1000人のフォロワー</p>
            </div>
        </div>

        <!-- DMメッセージ表示 -->
        <div class="dm-messages mb-4" style="border: 1px solid #ccc; border-radius: 8px; padding: 15px; height: 400px; overflow-y: scroll;">
            <!-- メッセージ1 -->
            <div class="dm-message mb-3">
                <div class="d-flex mb-2">
                    <!-- アイコン -->
                    <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" class="rounded-circle" alt="User Icon" style="width: 40px; height: 40px;">
                    
                    <!-- メッセージ内容 -->
                    <div class="ms-3" style="flex-grow: 1;">
                        <strong>ユーザー名</strong> 
                        <span class="text-muted" style="font-size: 0.85rem;">@ユーザーID</span>
                        <p style="font-size: 1rem;">こんにちは！今日はどうだった？</p>
                        <span class="text-muted" style="font-size: 0.75rem;">・ 1分前</span>
                    </div>
                </div>
            </div>

            <!-- メッセージ2 -->
            <div class="dm-message mb-3">
                <div class="d-flex mb-2">
                    <!-- アイコン -->
                    <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" class="rounded-circle" alt="User Icon" style="width: 40px; height: 40px;">
                    
                    <!-- メッセージ内容 -->
                    <div class="ms-3" style="flex-grow: 1;">
                        <strong>自分の名前</strong> 
                        <span class="text-muted" style="font-size: 0.85rem;">@自分のID</span>
                        <p style="font-size: 1rem;">元気だよ！君はどう？</p>
                        <span class="text-muted" style="font-size: 0.75rem;">・ 2分前</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- DM送信ボックス -->
        <div class="dm-send-box mt-4" style="border-top: 1px solid #ccc; padding-top: 10px;">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="メッセージを入力..." aria-label="Message" aria-describedby="sendMessageButton">
                <button class="btn btn-primary" type="button" id="sendMessageButton">送信</button>
            </div>
        </div>
    </div>
@endsection
