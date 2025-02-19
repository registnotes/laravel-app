<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Following extends Authenticatable
{
    use HasFactory;

    protected $table = 'following';
    protected $fillable = ['follower_user_id', 'following_user_id'];

    // `followingUser` リレーションを追加
    public function followingUser()
    {
        return $this->belongsTo(User::class, 'following_user_id', 'user_id');
    }

    // `followerUser` リレーションを追加
    public function followerUser()
    {
        return $this->belongsTo(User::class, 'follower_user_id', 'user_id');
    }
}
