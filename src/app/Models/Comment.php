<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // 複数代入を許可する属性の定義 (必要に応じてカスタマイズ)
    protected $fillable = ['item_id', 'user_id'];

    // Item リレーション (多対1)
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    // User リレーション (多対1)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
