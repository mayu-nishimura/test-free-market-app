<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    // 複数代入を許可する属性の定義 (必要に応じてカスタマイズ)
    protected $fillable = ['condition_name'];

    // Items リレーション (1対多)
    public function items()
    {
        return $this->hasMany(Item::class, 'condition_id');
        // hasMany リレーションで、Condition モデルが Item モデルに対して「1対多」の関係を表して、condition_id が items テーブル内で conditions テーブルを参照する外部キーとして利用
    }

}
