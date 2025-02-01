@extends('layouts.app')

@section('content')
<div class="container">
    <h2>プロフィール編集</h2>
    
    <form action="{{ route('profile.update', $user->user_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="user_name" class="form-label">ユーザー名</label>
            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name', $user->user_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="profile_description" class="form-label">プロフィール説明</label>
            <textarea class="form-control" id="profile_description" name="profile_description" rows="3">{{ old('profile_description', $user->profile_description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="profile_url" class="form-label">プロフィールURL</label>
            <input type="url" class="form-control" id="profile_url" name="profile_url" value="{{ old('profile_url', $user->profile_url) }}">
        </div>

        <div class="mb-3">
            <label for="profile_image" class="form-label">プロフィール画像</label>
            <input type="file" class="form-control" id="profile_image" name="profile_image">
        </div>

        <div class="mb-3">
            <label for="header_image" class="form-label">ヘッダー画像</label>
            <input type="file" class="form-control" id="header_image" name="header_image">
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
