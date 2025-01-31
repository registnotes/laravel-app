@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center" style="background-image: url('{{ $user->header_image_url }}'); background-size: cover; height: 200px;">
        </div>
        <div class="card-body text-center">
            <img src="{{ $user->profile_image_url }}" alt="Profile Image" class="rounded-circle" width="100" height="100">
            <h3 class="mt-3">{{ $user->user_name }}</h3>
            <p class="text-muted">{{$user->user_id }}</p>
            <p>{{ $user->profile_description }}</p>
            <a href="{{ $user->profile_url }}" class="btn btn-primary" target="_blank">プロフィールを見る</a>
        </div>
    </div>
</div>
@endsection
