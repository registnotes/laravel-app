<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfileController;

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ログイン前
Route::group(['middleware' => ['guest']], function() {
    //ログインフォーム表示
    Route::get('/' , [AuthController::class, 'showLogin'])->name('showLogin');
    //ログイン処理
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

//ログイン後
Route::group(['middleware' => ['auth']], function() {
    //ホーム画面
    Route::get('/home', function() {
        return view('login.home');
    })->name('login.home')->middleware();
    //ログアウト
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    //ツイート表示
    Route::get('/tweet', [TweetController::class, 'index']) ->name('tweet.index');
    //ツイート入力画面
    Route::get('/tweet/create', [TweetController::class, 'create'])->name('tweet.create');
    //ツイート投稿処理
    Route::post('/tweet', [TweetController::class, 'store'])->name('tweet.store');
    //プロフィール表示
    Route::get('/profile/{user_id}', [ProfileController::class, 'index'])->name('profile.index');
    // フォロー処理
    Route::post('/follow/{user_id}', [ProfileController::class, 'follow'])->name('follow');
    // アンフォロー処理
    Route::delete('/unfollow/{user_id}', [ProfileController::class, 'unfollow'])->name('unfollow');
    //フォロー一覧表示
    Route::get('/following/{user_id}', [ProfileController::class, 'following'])->name('profile.following');
    //フォロワー一覧表示
    Route::get('/follower/{user_id}', [ProfileController::class, 'followers'])->name('profile.followers');



});
