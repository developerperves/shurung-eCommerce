<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'slug','details', 'photo', 'category_id','tags','meta_keywords','meta_descriptions'];
    public function category()
    {
    	return $this->belongsTo('App\BlogCategory')->withDefault();
    }
}
