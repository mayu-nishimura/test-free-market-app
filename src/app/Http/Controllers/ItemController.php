<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all(); // 商品一覧を取得
        return view('item.index', compact('items')); // ビューにデータを渡す
    }
}
