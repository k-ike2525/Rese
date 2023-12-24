<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\User;


class ReservationController extends Controller
{
    //...予約完了ページの表示...//
    public function index(){

        return view('/done');
    }

    //...DB:予約テーブルからの表示...//
    public function store(Request $request)
    {
        // ログインしているかどうかを確認
        if (!auth()->check()) {
            return redirect()->route('login')->withErrors(['login' => 'ログインしてください。']);
        }

        // リクエストデータを検証
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'count' => 'required|integer',
        ]);

        // ショップIDは表示ページから取得
       $shopId = $request->input('shop_id');


        // 新しい予約を作成
        Reservation::create([
            'user_id' => auth()->id(), // ユーザーID
            'shop_id' => $shopId,
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'count' => $request->input('count'),
        ]);

        // 予約完了
        return redirect('/done');
    }
    
    // 予約の編集画面を表示...//
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit', compact('reservation'));
    }

    //...DB:予約テーブル情報変更...//
    public function update(Request $request, $id)
    {
        // リクエストデータを検証
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'count' => 'required|integer',
        ]);

        // 予約情報を取得
        $reservation = Reservation::findOrFail($id);

        // 予約情報を更新
        $reservation->update([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'count' => $request->input('count'),
        ]);

        // リダイレクト
        return redirect('/my_page')->with('success', '予約情報を変更しました。');

    }
}
