<!-- resources/views/layouts/user.blade.php -->
<div class="user border p-3 mb-3">
    <div class="d-flex">
        <!-- アイコン画像 -->
        <div class="mr-3">
        <img src="{{ $user->profile_image_url ? asset($user->profile_image_url) : asset('storage/image/default_profile_image.png') }}" alt="アイコン" class="rounded-circle" width="50" height="50">

        </div>
        
        <!-- ユーザー情報 -->
        <div>
            <p>
                <strong>
                    <a href="{{ route('profile.index', ['user_id' => $user->user_id]) }}">
                        {{ $user->user_name ?? '不明なユーザー' }}
                    </a>
                </strong> ({{ $user->user_id ?? '不明' }})
            </p>
            <p>{{ $user->profile_description ?? '自己紹介文はありません' }}</p>
            <p>フォロワー数: {{ $user->followers->count() }}</p>
            <p>投稿数: {{ $user->tweets->count() }}</p>
            <p>登録日: {{ $user->created_at->format('Y-m-d') }}</p>
        </div>
    </div>
</div>
