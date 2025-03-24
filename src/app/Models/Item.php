<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // 複数代入を許可する属性の定義 (必要に応じてカスタマイズ)

    protected $fillable = [
        'user_id',
        'condition_id',
        'item_name',
        'brand_name',
        'price',
        'detail',
        'img_url',
        'sold',
    ];

    // キャストの設定
    protected $casts = [
        'price' => 'integer',        // price を整数として扱う
        'sold' => 'boolean',         // sold をブール値（true/false）として扱う
    ];

    // Categoriesリレーション (多対多)
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_items');
    }

    // Condition リレーション (多対1)
    public function condition()
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }

    // User リレーション (多対1)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Likesリレーション (1対多)
    public function likes()
    {
        return $this->hasMany(Like::class, 'item_id');
    }

    // Commentsリレーション (1対多)
    public function comments()
    {
        return $this->hasMany(Comment::class, 'item_id');
    }

    // Order リレーション (1対1)
    public function order()
    {
        return $this->hasOne(Order::class, 'item_id');
    }

    // CategoryItemリレーション (1対多)
    public function categoryItems()
    {
        return $this->hasMany(CategoryItem::class, 'category_id');
    }
    // hasMany リレーションで、Item モデルが CategoryItem モデルに対して「1対多」の関係を表して、category_id が categories_items テーブル内で icategories テーブルを参照する外部キーとして利用
}
