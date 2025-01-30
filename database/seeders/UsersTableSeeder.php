<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'user_id' => 'user1',
                'user_name' => 'User One',
                'email' => 'user1@example.com',
                'password' => bcrypt('password'),
                'profile_description' => 'This is user one',
                'header_image_url' => 'https://example.com/header1.jpg',
                'profile_image_url' => 'https://example.com/profile1.jpg',
                'profile_url' => 'https://example.com/user1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 'user2',
                'user_name' => 'User Two',
                'email' => 'user2@example.com',
                'password' => bcrypt('password'),
                'profile_description' => 'This is user two',
                'header_image_url' => 'https://example.com/header2.jpg',
                'profile_image_url' => 'https://example.com/profile2.jpg',
                'profile_url' => 'https://example.com/user2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 他のユーザーも追加可能
        ]);
    }
}
