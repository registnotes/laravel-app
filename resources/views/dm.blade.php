@extends('layouts.app')

@section('title', 'DM一覧')

@section('content')
    <div class="container">
        <!-- DMリスト -->
        <div class="dm-list">
            <!-- DM1 -->
            <a href="{{ route('messages') }}" class="dm-link">
                <div class="dm" style="border: 1px solid #ccc; border-radius: 8px; padding: 15px; margin-bottom: 0;">
                    <div class="d-flex mb-3">
                        <!-- アイコンの横幅を30%に設定 -->
                        <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" class="rounded-circle" alt="User Icon" style="width: 50px; height: 50px; flex-shrink: 0;">
                        
                        <!-- DM内容の横幅を残りの70%に設定 -->
                        <div class="ms-3" style="flex-grow: 1; width: 70%;">
                            <strong>ユーザー名</strong>
                            <span class="text-muted" style="font-size: 0.85rem;">@ユーザーID</span>
                            <span class="text-muted" style="font-size: 1rem;">・ 2024/1/23</span> <!-- DM日付 -->
                            <p style="display: block; width: 100%;">ここにDM内容が表示されます。</p> <!-- DM本文 -->
                        </div>
                    </div>
                </div>
            </a>

            <!-- DM2 -->
            <a href="{{ route('messages') }}" class="dm-link">
                <div class="dm" style="border: 1px solid #ccc; border-radius: 8px; padding: 15px; margin-bottom: 0;">
                    <div class="d-flex mb-3">
                        <!-- アイコンの横幅を30%に設定 -->
                        <img src="https://i.gyazo.com/d671b3ffc77de5382afd09d6f704832c.png" class="rounded-circle" alt="User Icon" style="width: 50px; height: 50px; flex-shrink: 0;">
                        
                        <!-- DM内容の横幅を残りの70%に設定 -->
                        <div class="ms-3" style="flex-grow: 1; width: 70%;">
                            <strong>ユーザー名</strong>
                            <span class="text-muted" style="font-size: 0.85rem;">@ユーザーID</span>
                            <span class="text-muted" style="font-size: 1rem;">・ 2024/1/22</span> <!-- DM日付 -->
                            <p style="display: block; width: 100%;">こちらは別のDM内容です。</p> <!-- DM本文 -->
                        </div>
                    </div>
                </div>
            </a>

            <!-- 他のDMはここに追加できます -->
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .dm-link {
            text-decoration: none; /* リンクの下線を消す */
            color: inherit; /* デフォルトの文字色を継承 */
            display: block;
        }

        .dm-link:hover {
            background-color: #f8f9fa; /* ホバー時の背景色 */
            cursor: pointer; /* カーソルを手のひらに */
        }

        /* ホバー時にリンク内のテキストの色が変わらないように設定 */
        .dm-link,
        .dm-link strong,
        .dm-link span {
            color: inherit; /* デフォルトの色を継承 */
        }
    </style>
@endpush
