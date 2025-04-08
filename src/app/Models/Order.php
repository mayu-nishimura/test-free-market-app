<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // 一括代入を許可する属性の定義
    protected $fillable = ['item_id', 'user_id'];

    // User リレーション (多対1)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     // Item リレーション (一対一)
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

}
