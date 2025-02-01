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

        // ランダムにプロフィール画像とヘッダー画像を選択
        $profileImages = File::files(storage_path('app/public/profile_images_seed'));
        $headerImages = File::files(storage_path('app/public/header_images_seed'));

        // ランダムにファイルを選択
        $randomProfileImage = $profileImages[array_rand($profileImages)];
        $randomHeaderImage = $headerImages[array_rand($headerImages)];



        return [
            'user_id' => Str::random(15),  // 15文字のランダム文字列
            'user_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'profile_description' => fake()->realText(140),
            'header_image_url' => 'storage/header_images_seed/' . basename($randomHeaderImage),
            'profile_image_url' => 'storage/profile_images_seed/' . basename($randomProfileImage),
            'profile_url' => $this->faker->url(),
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
