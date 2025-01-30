<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/', 'home')->name('home');
Route::view('/search', 'search')->name('search');
Route::view('/dm', 'dm')->name('dm');
Route::view('/profile', 'profile')->name('profile');
Route::view('/more', 'more')->name('more');
Route::view('/tweet', 'tweet')->name('tweet');
Route::view('/change', 'change')->name('change');
Route::view('/messages', 'messages')->name('messages');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');