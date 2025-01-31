<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Like;

class Tweet extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'tweet_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'tweet_id',
        'user_id',
        'tweet_content',
        'tweet_image_path',

    ];


    // Userテーブルに対するいいねリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // ツイートに対するいいねリレーション
    public function likes()
    {
        return $this->hasMany(Like::class, 'tweet_id', 'tweet_id');
    }
}
