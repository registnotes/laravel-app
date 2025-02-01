<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker; // ここを追加
use App\Models\User; // Userモデルをインポート

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tweet>
 */
class TweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // ランダムにユーザーIDを取得
        $user_id = User::inRandomOrder()->first()->user_id; // usersテーブルからランダムにuser_idを取得

        // 画像を設定するかどうかランダムで決定（2割の確率で画像あり）
        $hasImage = rand(1, 5) <= 2;  // 1~5のうち、1の確率で画像あり

        // 画像パスを設定（画像ありの場合）
        $tweet_image_path = null;
        if ($hasImage) {
            $imageIndex = rand(1, 100);  // 1〜100のランダムな画像番号
            $tweet_image_path = 'storage/tweets_seed/tweet_image_' . $imageIndex . '.jpg';  // 画像パス
        }



        return [
            'tweet_id' => Str::random(20),
            'user_id' => $user_id,  // ランダムに取得したuser_id
            'tweet_content' => fake()->realText(140),
            'tweet_image_path' => $tweet_image_path,  // 画像パス（nullの場合は画像なし）
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
