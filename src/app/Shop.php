<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function area()
{
    return $this->belongsTo(Area::class);
}

public function genre()
{
    return $this->belongsTo(Genre::class);
}

public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'shop_id', 'user_id')->withTimestamps();
    }
}
