@extends('layouts.app')

@section('title', 'ツイート')

@section('content')
<form action="#" method="post">
    @csrf
    <textarea class="form-control" rows="3" placeholder="ツイートを入力"></textarea>
    <button class="btn btn-primary mt-2">ツイート</button>
</form>
@endsection

