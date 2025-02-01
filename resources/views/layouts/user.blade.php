<!-- resources/views/layouts/user.blade.php -->
<div class="user border p-3 mb-3">
    <p>
        <strong>
            <a href="{{ route('profile.index', ['user_id' => $user->user_id]) }}">
                {{ $user->user_name ?? '不明なユーザー' }}
            </a>
        </strong> ({{ $user->user_id ?? '不明' }})
    </p>
    <p>{{ $user->profile_description }}</p>
    <p>フォロワー数: {{ $user->followers->count() }}</p>
    <p>投稿数: {{ $user->tweets->count() }}</p>
    <p>登録日: {{ $user->created_at->format('Y-m-d') }}</p>
</div>
