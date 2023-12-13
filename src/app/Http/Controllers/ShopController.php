<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
public function index()
    {
        $shops = Shop::all();
        
        return view('home', ['shops' => $shops]);
    }
    public function detail($id)
    {
        // $id を使用して詳細情報をデータベースから取得
        $shop = Shop::find($id);

        // 詳細ビューを表示
        return view('detail', compact('shop'));
    }

    public function search(Request $request)
{
    $area = $request->input('area');
    $genre = $request->input('genre');
    $search = $request->input('search');

    $shops = Shop::query();

    if ($area != 0) {
        $shops->where('area_id', $area);
    }

    if ($genre != 0) {
        $shops->where('genre_id', $genre);
    }

    if (!empty($search)) {
        $shops->where('shop_name', 'like', '%' . $search . '%');
    }

    $shops = $shops->get();

    return view('home', ['shops' => $shops]);
}


}
