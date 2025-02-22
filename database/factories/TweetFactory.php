<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker; // ここを追加
use App\Models\User; // Userモデルをインポート
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage; // S3用


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
        $user_id = User::inRandomOrder()->first()->user_id;

        // 性別をランダムに取得
        $gender = User::find($user_id)->gender;

        // 性別に応じたツイート内容を選択
        //$tweetFile = storage_path('app/public/tweet_' . $gender . '.txt');
        //$tweetLines = file($tweetFile, FILE_IGNORE_NEW_LINES);
        // S3から読み込む
        $tweetFile = "storage/tweet_{$gender}.txt";  
        $tweetLines = explode("\n", Storage::disk('s3')->get($tweetFile));

        $tweetContent = $tweetLines[array_rand($tweetLines)];

        // 画像を設定するかどうかランダムで決定（2割の確率で画像あり）
        $hasImage = rand(1, 5) <= 2;

        // 画像パスを設定（画像ありの場合）
        $tweet_image_path = null;
        if ($hasImage) {
            $imageIndex = rand(1, 100);  // 1〜100のランダムな画像番号
            $tweet_image_path = 'storage/tweets_seed/tweet_image_' . $imageIndex . '.jpg';  // 画像パス
        }

        return [
            'tweet_id' => Str::random(20),
            'user_id' => $user_id,  // ランダムに取得したuser_id
            'tweet_content' => $tweetContent,  // ランダムなツイート内容
            //'tweet_image_path' => $tweet_image_path,  // 画像パス（nullの場合は画像なし）
            'tweet_image_path' => $tweet_image_path ? 'https://s3.ap-northeast-1.amazonaws.com/s3.cloud-app-lab.com/' . $tweet_image_path : null,  // S3のURLを設定
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
