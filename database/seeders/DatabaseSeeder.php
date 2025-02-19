<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Following;
use App\Models\Like;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 40件のユーザーデータを作成
        if (User::count() === 0) {
            User::factory(40)->create();
        }

        //1000件のツイートデータを作成
        if (Tweet::count() === 0) {
            Tweet::factory(1000)->create();
        }

        // 600件のフォローデータを作成
        if (Following::count() === 0) {
            Following::factory(600)->create();
        }

        // LikesTableSeeder を呼び出す
        if (Like::count() === 0) {
            $this->call(LikesTableSeeder::class);
        }
    }
}
