<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Shop;
use App\Models\Reservation; 

class MyPageController extends Controller
{
    //...マイページの表示...//
    public function index()
    {
        return view('my_page');
    }


    //...DB:予約テーブル・お気に入りテーブルからの表示...//
    public function myPage()
    {
        //予約情報を表示
        $reservations = Reservation::with('shop')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        //お気に入り店舗を表示
        $favoriteShops = auth()->user()->favorites;

        return view('my_page', compact('reservations','favoriteShops'));
    }

    //...予約削除機能...//
    public function cancelReservation($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['error' => '予約が見つかりません'], 404);
        }

        //予約を削除,更新処理[予約が取り消されました]を表示
        $reservation->delete();

        return response()->json(['message' => '予約が取り消されました']);
    }

    //...お気に入り削除・・・（マイページ側）...//
    public function removeFromFavorites($shopId)
    {
        $user = auth()->user();

        // ユーザーが指定したショップをお気に入りから削除
        $user->favorites()->detach($shopId);

        return response()->json(['message' => 'Removed from favorites']);
    }
}

