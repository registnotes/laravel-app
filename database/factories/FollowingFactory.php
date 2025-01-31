<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker; // ここを追加
use App\Models\User; // Userモデルをインポート
use App\Models\Following;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Following>
 */
class FollowingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // ランダムなフォロワーとフォロー対象を選択（同じユーザーを選ばないようにする）
        $follower_user = User::inRandomOrder()->first();
        if (!$follower_user) {
            // ユーザーがいない場合は適切な処理（エラーやスキップ）
            return [];
        }

        $follower_user_id = $follower_user->user_id;

        // 自分をフォローしないように別のユーザーを選択
        $following_user = User::where('user_id', '!=', $follower_user_id)->inRandomOrder()->first();
        if (!$following_user) {
            // フォロー対象がいない場合は適切な処理（エラーやスキップ）
            return [];
        }

        $following_user_id = $following_user->user_id;

        return [
            'follower_user_id' => $follower_user_id,
            'following_user_id' => $following_user_id,
        ];
    }
}
