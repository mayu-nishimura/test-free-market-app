<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // 複数代入を許可する属性の定義 (必要に応じてカスタマイズ)
    protected $fillable = ['category_name'];

    // CategoryItemリレーション (1対多)
    public function categoryItems()
    {
        return $this->hasMany(CategoryItem::class, 'category_id');
    }
    // hasMany リレーションで、Category モデルが CategoryItem モデルに対して「1対多」の関係を表して、item_id が categories_items テーブル内で items テーブルを参照する外部キーとして利用

}
