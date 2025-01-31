<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tweet;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        // ユーザー情報の取得
        $user = User::where('user_id', $user_id)->firstOrFail();
        
        // ユーザーの投稿（ツイート）を取得
        $tweets = Tweet::where('user_id', $user_id)->get(); // ユーザーIDでツイートを取得

        // ビューにユーザー情報とツイートを渡す
        return view('profile.index', compact('user', 'tweets'));
    }
}
