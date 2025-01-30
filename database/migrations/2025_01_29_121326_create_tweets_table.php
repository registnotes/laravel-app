<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetsTable extends Migration
{
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            // tweet_id を BIGINT として設定し、自動インクリメントを設定
            $table->bigIncrements('tweet_id'); // BIGINT の自動インクリメント

            // user_id と tweet_content の設定
            $table->string('user_id');
            $table->text('tweet_content');
            $table->timestamps();

            // 外部キー制約: user_id が users テーブルの user_id を参照
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
