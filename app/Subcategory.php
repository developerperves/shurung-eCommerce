<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['name', 'slug', 'category_id','status'];
    public $timestamps = false;


    public function category()
    {
        return $this->belongsTo('App\Category')->withDefault();
    }
}
