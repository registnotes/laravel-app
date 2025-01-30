<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TweetsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tweets')->insert([
            [
                'tweet_id' => 1,
                'user_id' => 'user1',
                'tweet_content' => 'This is the first tweet.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tweet_id' => 2,
                'user_id' => 'user2',
                'tweet_content' => 'This is the second tweet.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 他のツイートも追加可能
        ]);
    }
}
