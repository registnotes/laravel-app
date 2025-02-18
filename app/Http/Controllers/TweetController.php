<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Support\Facades\Log; //ログチェック用
use App\Models\Like;
use App\Models\User;


class TweetController extends Controller
{
    /**
     * @param なし
     * @return view
     */
    public function index(Request $request)
    {
        // 最新のツイートを10件取得し、ユーザー情報を合わせて取得
        $tweets = Tweet::with('user')->latest()->paginate(10);

        return view('tweet.index', compact('tweets'));
    }

    /**
     * ツイート入力画面を表示
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tweet.create');
    }

    /**
     * ツイート投稿処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'tweet_content' => 'required|string|max:140',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 画像のバリデーション
        ]);

        // 画像をアップロードした場合
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tweets', 'public'); // 'tweets' フォルダに保存
            Log::info('Image uploaded: ' . $imagePath);  // 画像パスをログに出力
        } else {
            $imagePath = null;
        }
        
        // ツイート作成
        Tweet::create([
            'tweet_id' => (string) now()->timestamp . rand(1000, 9999), // 一意なID
            'user_id' => auth()->user()->user_id, // 認証済みユーザーのIDを取得
            'tweet_content' => $request->input('tweet_content'),
            'tweet_image_path' => $imagePath, // 画像のパスを保存
        ]);
        
        return redirect()->route('tweet.index')->with('success', 'ツイートを投稿しました。');
    }






    // いいねを追加または解除する処理
    public function toggleLike($tweet_id)
    {
        $user_id = auth()->user()->user_id; // 現在ログインしているユーザーのID

        // いいねが存在するかを確認
        $like = Like::where('user_id', $user_id)->where('tweet_id', $tweet_id)->first();

        if ($like) {
            // 既にいいねしている場合は解除
            $like->delete();
            return back()->with('success', 'いいねを解除しました');
        } else {
            // まだいいねしていない場合は追加
            Like::create([
                'user_id' => $user_id,
                'tweet_id' => $tweet_id,
            ]);
            return back()->with('success', 'いいねしました');
        }
    }







    // ツイート検索の処理
    public function searchTweets(Request $request)
    {
        $query = Tweet::with(['user', 'likes']); // ユーザー情報も取得

        // キーワード検索（ツイート内容）
        if ($request->has('keyword')) {
            $query->where('tweet_content', 'like', '%' . $request->input('keyword') . '%');
        }

        // 最新のツイート順
        if ($request->has('sort') && $request->input('sort') === 'latest') {
            $query->latest();
        }

        // いいね数が多い順
        if ($request->has('sort') && $request->input('sort') === 'likes') {
            $query->withCount('likes')->orderBy('likes_count', 'desc');
        }

        // 画像付きツイートのみ検索
        if ($request->has('image') && $request->input('image') == 'true') {
            $query->whereNotNull('tweet_image_path');
        }

        // 検索結果をページネーション
        $tweets = $query->paginate(35);

        return view('search.tweet', compact('tweets'));
    }

    // ユーザー検索の処理
    public function searchUsers(Request $request)
    {
        $query = User::query();

        // ユーザー名・ユーザーID・自己紹介文検索
        if ($request->has('user_search')) {
            $query->where('user_name', 'like', '%' . $request->input('user_search') . '%')
                ->orWhere('user_id', 'like', '%' . $request->input('user_search') . '%')
                ->orWhere('profile_description', 'like', '%' . $request->input('user_search') . '%');
        }

        // ソートの処理
        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'followers':
                    $query->withCount('followers')->orderBy('followers_count', 'desc');
                    break;
                case 'posts':
                    $query->withCount('tweets')->orderBy('tweets_count', 'desc');
                    break;
                case 'joined':
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }
        

        // 検索結果をページネーション
        $users = $query->paginate(35);

        return view('search.user', compact('users'));
    }










    public function likedTweets($user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();
    
        // いいねしたツイートを取得
        $likedTweets = Tweet::whereHas('likes', function ($query) use ($user) {
            $query->where('user_id', $user->user_id);
        })->latest()->paginate(35);
    
        return view('profile.likes', compact('user', 'likedTweets'));
    }
    
    public function mediaTweets($user_id)
    {
        // ユーザーを取得
        $user = User::where('user_id', $user_id)->firstOrFail();

        // 画像付きツイートを取得し、ページネーションを適用
        $mediaTweets = Tweet::where('user_id', $user->user_id)
                        ->whereNotNull('tweet_image_path')
                        ->latest()
                        ->paginate(35);  // ページネーションを設定

        return view('profile.media', compact('user', 'mediaTweets'));
    }
    






}
