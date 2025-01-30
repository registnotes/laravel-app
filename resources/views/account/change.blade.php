<!-- resources/views/account/change.blade.php -->

@extends('layouts.app')

@section('title', 'アカウント変更')

@section('content')
    <div class="container">
        <h1>アカウント変更</h1>
        <!-- フォームなどを追加する -->
        <form action="{{ route('account.update') }}" method="POST">
            @csrf
            <!-- フォームフィールドをここに追加 -->
            <button type="submit" class="btn btn-primary">変更</button>
        </form>
    </div>
@endsection

