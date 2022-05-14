<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialShareController extends Controller
{
    public function shareButtons()
    {
        $socialShares = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();
        
        return view('posts', compact('socialShares'));
    }
    
}
