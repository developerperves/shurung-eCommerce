<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['_token'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function is_stock()
    {
        $product = $this;
            if($product->stock){
                if($product->stock != 0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
     
    }
}
