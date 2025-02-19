<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Like extends Authenticatable
{
    use HasFactory;

    protected $table = 'likes';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'user_id',
        'tweet_id',
    ];
    public $timestamps = true;

    //いいねに対するツイートリレーション
    public function tweet()
    {
        return $this->belongsTo(Tweet::class, 'tweet_id', 'tweet_id');
    }

    //いいねに対するユーザーリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
