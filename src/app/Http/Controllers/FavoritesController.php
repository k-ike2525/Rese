<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Favorite;

use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    //...サーバー読み込みによるデータチェック...//
    public function checkFavorite(Request $request, $shopId)
    {
        $user = $request->user();

        //ユーザーが指定したショップをお気に入りに登録しているか確認
        $isFavorite = $user->favorites()->where('shop_id', $shopId)->exists();

        return response()->json(['isFavorite' => $isFavorite]);
    }


    //...お気に入り　オンオフ切り替え...//
    public function toggleFavorite(Request $request, $shopId)
    {
        $user = $request->user();

        //お気に入りの状態を取得
        $isFavorite = $user->favorites()->where('shop_id', $shopId)->exists();

        if ($isFavorite) {
            //お気に入りから削除
            $user->favorites()->detach($shopId);
        } else {
            //お気に入りに追加
            $user->favorites()->attach($shopId);
        }

        return response()->json(['isFavorite' => !$isFavorite]);
    }

}
