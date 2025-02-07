<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Like;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ユーザーとツイートを全件取得
        $users = User::all();
        $tweets = Tweet::all();

        foreach ($users as $user) {
            // 各ユーザーがランダムにツイートへいいね（最大10件）
            $tweets->random(rand(1, 60))->each(function ($tweet) use ($user) {
                // すでに存在しない場合のみいいねを作成
                Like::firstOrCreate([
                    'user_id' => $user->user_id,
                    'tweet_id' => $tweet->tweet_id,
                ]);
            });
        }
    }
}
