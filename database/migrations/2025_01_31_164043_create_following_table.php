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
        Schema::create('following', function (Blueprint $table) {
            $table->id();
            $table->string('follower_user_id');  // フォロワーのユーザーID
            $table->string('following_user_id'); // フォローされているユーザーID
            $table->timestamps();

            // 外部キー制約（必要に応じて追加）
            $table->foreign('follower_user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('following_user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('following');
    }
};
