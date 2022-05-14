<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{

    protected $fillable = [
        'user_id',
        'item_id'
    ];

    function thisproduct()
    {
        return $this->hasOne('App\Product', 'id', 'item_id');
    }
}
