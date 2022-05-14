<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'designation','photo', 'linkedin_link', 'twitter_link', 'instagram_link', 'facebook_link'];
    public $timestamps = false;
}
