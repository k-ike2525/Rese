<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index(){
        return view('/done');
    }


    public function store(Request $request)
    {
        // バリデーションなど必要に応じて追加

        // フォームデータを使って新しい予約を作成
        Reservation::create([
            'user_id' => auth()->id(), // ユーザーID
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'count' => $request->input('num_people'),
        ]);

        // 予約が完了したらリダイレクトなどを行う
        return redirect('/done');
    }
}
