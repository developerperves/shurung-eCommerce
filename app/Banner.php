<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['photo', 'heading_one', 'heading_two', 'description', 'status'];
}
