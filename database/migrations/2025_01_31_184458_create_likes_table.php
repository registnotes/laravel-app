<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 15); // いいねしたユーザー
            $table->string('tweet_id', 20); // いいねされたツイート
            $table->timestamps();

            $table->unique(['user_id', 'tweet_id']); // 同じツイートに複数回いいねできないようにする
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade'); // 外部キー制約
            $table->foreign('tweet_id')->references('tweet_id')->on('tweets')->onDelete('cascade'); // 外部キー制約
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
