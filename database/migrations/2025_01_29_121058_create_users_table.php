<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // user_id を文字列型として設定
            $table->string('user_id')->primary();  // user_idを文字列型に変更し、主キーとする
            $table->string('user_name'); // ユーザー名
            $table->string('email')->unique(); // email
            $table->string('password'); // password
            $table->string('profile_description')->nullable(); // プロフィール説明文
            $table->string('header_image_url')->nullable(); // ヘッダー画像URL
            $table->string('profile_image_url')->nullable(); // プロフィール画像URL
            $table->string('profile_url')->nullable(); // プロフィールURL
            $table->timestamps(); // created_at と updated_at を自動で管理


        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
