<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = ['name','slug', 'photo','status','is_feature','meta_keywords','meta_descriptions','serial'];
    public $timestamps = false;
    
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function subcategory()
    {
        return $this->hasMany('App\Subcategory');
    }
}
