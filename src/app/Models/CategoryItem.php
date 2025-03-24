<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryItem extends Model
{
    use HasFactory;

    // 一括代入を許可するカラム
    protected $fillable = [
        'category_id',
        'item_id',
    ];

    // Category リレーション (多対1)
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Item リレーション (多対1)
    public function user()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
