<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id'; // 主キーのカラム名を設定
    public $incrementing = false; // 自動増分を無効化
    protected $keyType = 'string'; // 主キーの型を文字列に

    protected $fillable = [
        'user_id',
        'user_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}

