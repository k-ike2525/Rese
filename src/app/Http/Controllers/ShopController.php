<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    //  店舗一覧ページ表示
    //...DB:ショップテーブルからの表示...//
    public function index()
    {
        $shops = Shop::all();
        
        return view('home', ['shops' => $shops]);
    }

    //...店舗詳細ページ表示...//
    //...DB:ショップテーブルからの表示...//
    public function detail($id)
    {
        $shop = Shop::find($id);

        return view('detail', compact('shop'));
    }

    //...検索機能より...//
    //...DB:ジャンルテーブル・エリアテーブル・ショップテーブルからの表示,,,//
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
