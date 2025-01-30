<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('like_id');  // like_idを自動インクリメントの主キーに設定
            $table->string('user_id');  // user_idは文字列のまま
            $table->bigInteger('tweet_id')->unsigned(); // tweet_idをBIGINT型に変更
            $table->timestamps();

            // 外部キー制約: user_id を users テーブルの user_id と結びつけ
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            // 外部キー制約: tweet_id を tweets テーブルの tweet_id と結びつけ
            $table->foreign('tweet_id')->references('tweet_id')->on('tweets')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
