<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'slug','photo', 'status','is_popular'];
    public $timestamps = false;

}
