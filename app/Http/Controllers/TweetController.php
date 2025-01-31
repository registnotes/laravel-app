<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Support\Facades\Log; //ログチェック用

class TweetController extends Controller
{
    /**
     * @param なし
     * @return view
     */
    public function index(Request $request)
    {
        // 最新のツイートを10件取得
        $tweets = Tweet::latest()->paginate(10);

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
        ]);
        
        // ツイート作成
        Tweet::create([
            'tweet_id' => (string) now()->timestamp . rand(1000, 9999), // 一意なID
            'user_id' => auth()->user()->user_id, // 認証済みユーザーのIDを取得
            'tweet_content' => $request->input('tweet_content'),
        ]);
        
        return redirect()->route('tweet.index')->with('success', 'ツイートを投稿しました。');
    }

}
