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

        return [
            'tweet_id' => Str::random(20),
            'user_id' => $user_id,  // ランダムに取得したuser_id
            'tweet_content' => fake()->realText(140),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
