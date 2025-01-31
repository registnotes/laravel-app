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
        $tweets = Tweet::where('user_id', $user_id)->get();
        
        // 自分のユーザーIDを取得
        $currentUser = auth()->user();

        // フォローしているかどうかを確認
        $isFollowing = $currentUser->isFollowing($user->user_id);

        // ビューにユーザー情報とツイートを渡す
        return view('profile.index', compact('user', 'tweets', 'isFollowing'));
    }

    // フォロー処理
    public function follow($user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();
        auth()->user()->follow($user->user_id);

        return redirect()->route('profile.index', $user->user_id);
    }

    // アンフォロー処理
    public function unfollow($user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();
        auth()->user()->unfollow($user->user_id);

        return redirect()->route('profile.index', $user->user_id);
    }




    // フォローしている人を表示
    public function following($user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();
        $following = $user->followings; // 'following' -> 'followings'に変更

        return view('profile.following', compact('user', 'following'));
    }

    // フォロワーを表示
    public function followers($user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();
        $followers = $user->followers;

        return view('profile.followers', compact('user', 'followers'));
    }








    public function likedTweets($user_id)
    {
        // ユーザーがいいねしたツイートを取得
        $user = User::where('user_id', $user_id)->firstOrFail();

        // ユーザーがいいねしたツイートを取得
        $likedTweets = Tweet::whereHas('likes', function($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->latest()->paginate(10);

        // ビューに渡すデータ
        return view('profile.likes', compact('likedTweets', 'user'));
    }


}
