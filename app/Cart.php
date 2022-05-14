<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = ['_token'];
    function product()
    {
        return $this->belongsTo('App\Product');
    }
}
