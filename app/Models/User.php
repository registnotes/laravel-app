<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'user_name',
        'email',
        'password',
        'profile_description',
        'header_image_url',
        'profile_image_url',
        'profile_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // protected function casts(): array
    // {
    //     return [
    //         'email_verified_at' => 'datetime',
    //         'password' => 'hashed',
    //     ];
    // }




    // フォローする
    public function follow($user_id)
    {
        return $this->followings()->create(['following_user_id' => $user_id]);
    }

    // アンフォローする
    public function unfollow($user_id)
    {
        return $this->followings()->where('following_user_id', $user_id)->delete();
    }

    // フォローしているユーザーを取得
    public function followings()
    {
        return $this->hasMany(Following::class, 'follower_user_id', 'user_id');
    }

    // フォロワーを取得
    public function followers()
    {
        return $this->hasMany(Following::class, 'following_user_id', 'user_id');
    }

    // フォローしているかどうかの確認
    public function isFollowing($user_id)
    {
        return $this->followings()->where('following_user_id', $user_id)->exists();
    }





    // Userモデル
    public function tweets()
    {
        return $this->hasMany(Tweet::class, 'user_id');
    }





}
