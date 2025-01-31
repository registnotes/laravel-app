<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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
});
