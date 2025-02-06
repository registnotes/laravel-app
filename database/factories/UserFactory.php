<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker; // ここを追加
use Illuminate\Support\Facades\File;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 性別をランダムに決める
        $gender = $this->faker->randomElement(['male', 'female']);

        // 性別に応じた名前を生成
        if ($gender === 'male') {
            $userName = $this->faker->lastName() . ' ' . $this->faker->firstNameMale();
        } else {
            $userName = $this->faker->lastName() . ' ' . $this->faker->firstNameFemale();
        }

        // ランダムにプロフィール画像とヘッダー画像を選択
        $profileImages = File::files(storage_path('app/public/profile_images_seed/' . $gender));
        $headerImages = File::files(storage_path('app/public/header_images_seed'));

        // ランダムにファイルを選択
        $randomProfileImage = $profileImages[array_rand($profileImages)];
        $randomHeaderImage = $headerImages[array_rand($headerImages)];

        // 性別に応じたプロフィール説明文を選択
        $descriptionFile = storage_path('app/public/description_' . $gender . '.txt');
        $descriptionLines = file($descriptionFile, FILE_IGNORE_NEW_LINES);
        $profileDescription = $descriptionLines[array_rand($descriptionLines)];

        return [
            'user_id' => Str::random(15),  // 15文字のランダム文字列
            'user_name' => $userName,
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'profile_description' => $profileDescription,  // ランダムな自己紹介文
            'header_image_url' => 'storage/header_images_seed/' . basename($randomHeaderImage),
            'profile_image_url' => 'storage/profile_images_seed/' . $gender . '/' . basename($randomProfileImage),
            'profile_url' => $this->faker->url(),
            'gender' => $gender, //シード用の性別
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
