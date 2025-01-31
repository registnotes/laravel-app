<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Like extends Authenticatable
{
    use HasFactory;

    // テーブル名（Laravelは自動的に複数形のテーブル名を推測しますが、明示的に設定することもできます）
    protected $table = 'likes';

    // 主キーのカラム名（Laravelは通常idを使いますが、異なる場合は指定）
    protected $primaryKey = 'id';

    // 複数代入可能なカラム（フィルアブル属性を設定）
    protected $fillable = [
        'user_id', // ユーザーID
        'tweet_id', // ツイートID
    ];

    // タイムスタンプを使用しない場合は false に設定（必要に応じて）
    public $timestamps = true;

    /**
     * いいねに対するツイートリレーション
     */
    public function tweet()
    {
        return $this->belongsTo(Tweet::class, 'tweet_id', 'tweet_id');
    }

    /**
     * いいねに対するユーザーリレーション
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
