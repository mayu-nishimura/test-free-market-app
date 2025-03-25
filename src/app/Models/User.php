<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'postal_code',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Likesリレーション (1対多)
    public function likes()
    {
        return $this->hasMany(Like::class, 'user_id');
    }

    // Itemsリレーション (1対多)
    public function items()
    {
        return $this->hasMany(Item::class, 'user_id');
    }

    // Commentsリレーション (1対多)
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    // Ordersリレーション (1対多)
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
