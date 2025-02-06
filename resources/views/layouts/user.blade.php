<!-- resources/views/layouts/user.blade.php -->
<div class="list-group-item">
    <div class="d-flex">
        <!-- アイコン画像 -->
        <img src="{{ $user->profile_image_url ? asset($user->profile_image_url) : asset('storage/image/default_profile_image.png') }}" alt="アイコン" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">

        <div class="ms-2">
            <!-- ユーザー名とID -->
            <h6 class="mb-1">
                <a href="{{ route('profile.index', ['user_id' => $user->user_id]) }}">
                    {{ $user->user_name ?? '不明なユーザー' }}
                </a>
                <small class="text-muted"> ({{ $user->user_id ?? '不明' }})</small>
            </h5>

            <!-- プロフィール内容 -->
            <p class="mb-1">{{ $user->profile_description ?? '自己紹介文はありません' }}</p>

            <!-- フォロワー数、投稿数 -->
            <!-- <p class="text-muted mb-1">フォロワー数: {{ $user->followers->count() }} | 投稿数: {{ $user->tweets->count() }}</p> -->

            <!-- 登録日 -->
            <!-- <small class="text-muted">登録日: {{ $user->created_at->format('Y-m-d') }}</small> -->
        </div>
    </div>
</div>
