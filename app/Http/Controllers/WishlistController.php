<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function store($id) {

        $user = Auth::user();

        if($user){
            if(Wishlist::where('user_id','=',$user->id)->where('item_id','=',$id)->exists())
            {
                return redirect()->back()->withError('Already Added To Wishlist.');
            }
    
            $user->wishlists()->create([
                'item_id' => $id
            ]);
        }else{
            return redirect()->route('login');
        }
        return redirect()->back()->withSuccess('Product Added To The Wishlist.');
    }
    
    public function delete($id)
    {
        $user = Auth::user();
        $wish = Wishlist::findOrFail($id);
        $wish->delete();
        return back()->withSuccess('Product Removed From Wishlist.');
    }
}

