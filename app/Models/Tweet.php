<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
}
