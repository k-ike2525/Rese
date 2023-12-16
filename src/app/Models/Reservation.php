<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
class Reservation extends Model
{
     protected $fillable = [
        'user_id', // 追加するプロパティ（他にもあればカンマで区切って追加）
        'date',
        'time',
        'count',
    ];
}
