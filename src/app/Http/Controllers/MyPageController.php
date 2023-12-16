<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class MyPageController extends Controller
{
    public function index(){
        return view('/my_page');
    }

    public function myPage()
    {
        // ログインユーザーに関連する予約情報を取得
        $reservations = Reservation::all();

        return view('my_page', ['reservations' => $reservations]);
    }
}
