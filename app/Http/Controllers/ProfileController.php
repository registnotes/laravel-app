<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Support\Facades\Storage; // S3用

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

        // フォロー数とフォロワー数を取得
        $followingCount = $user->followings()->count();
        $followerCount = $user->followers()->count();

        // ビューにユーザー情報とツイートを渡す
        return view('profile.index', compact('user', 'tweets', 'isFollowing', 'followingCount', 'followerCount'));
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
        $following = $user->followings()->paginate(35);  // ページネーションを追加

        return view('profile.following', compact('user', 'following'));
    }

    // フォロワーを表示
    public function followers($user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();
        $followers = $user->followers()->paginate(35);  // ページネーションを追加

        return view('profile.followers', compact('user', 'followers'));
    }


    //いいねしたツイートを取得
    public function likedTweets($user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();
    
        $likedTweets = Tweet::whereHas('likes', function ($query) use ($user) {
            $query->where('user_id', $user->user_id);
        })->latest()->paginate(35);
    
        return view('profile.likes', compact('user', 'likedTweets'));
    }
    
    // 画像付きツイートを取得
    public function mediaTweets($user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();

        $mediaTweets = Tweet::where('user_id', $user->user_id)
                        ->whereNotNull('tweet_image_path')
                        ->latest()
                        ->paginate(35);

        return view('profile.media', compact('user', 'mediaTweets'));
    }


    //プロフィールの編集画面
    public function edit($user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();

        // ログインユーザーのみ編集可能
        if (auth()->user()->user_id !== $user->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('profile.edit', compact('user'));
    }

    //プロフィール情報更新処理
    public function update(Request $request, $user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();

        // ログインユーザーのみ編集可能
        if (auth()->user()->user_id !== $user->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'user_name' => 'required|string|max:30',
            'profile_description' => 'nullable|string|max:140',
            'profile_url' => 'nullable|url',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'header_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        // 画像のアップロード処理
        if ($request->hasFile('profile_image')) {
            //ローカルにアップ
            //$profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
            //$user->profile_image_url = asset('storage/' . $profileImagePath);
            //S3にアップ
            $profileImagePath = $request->file('profile_image')->store('storage/profile_images', 's3');
            $user->profile_image_url = Storage::disk('s3')->url($profileImagePath);
        }
        
        if ($request->hasFile('header_image')) {
            //ローカルにアップ
            //$headerImagePath = $request->file('header_image')->store('header_images', 'public');
            //$user->header_image_url = asset('storage/' . $headerImagePath);
            //S3にアップ
            $headerImagePath = $request->file('header_image')->store('storage/header_images', 's3');
            $user->header_image_url = Storage::disk('s3')->url($headerImagePath);
        }

        // その他のデータを更新
        $user->update([
            'user_name' => $validated['user_name'],
            'profile_description' => $validated['profile_description'],
            'profile_url' => $validated['profile_url'],
        ]);

        return redirect()->route('profile.index', $user->user_id)->with('success', 'プロフィールが更新されました。');
    }
}
