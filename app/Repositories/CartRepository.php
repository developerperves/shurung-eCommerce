<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Cart;

class CartRepository
{
    public function __construct()
    {
    }

    function store($request)
    {

        // print_r($request->productId);
        // die();
        if (Cookie::get('g_cart_id')) {
            $generated_cart_id = Cookie::get('g_cart_id');
        } else {
            $generated_cart_id = Str::random(5) . rand(1, 1000);

            Cookie::queue('g_cart_id', $generated_cart_id, 1440);
        }
        if (Cart::where('generated_cart_id', $generated_cart_id)->where('product_id', $request->productId)->exists()) {
            Cart::where('generated_cart_id', $generated_cart_id)->where('product_id', $request->productId)->increment('product_quantity', 1);
        } else {
            Cart::insert([
                'generated_cart_id' => $generated_cart_id,
                'product_id' => $request->productId,
                'product_quantity' => $request->product_quantity,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('cart added', 'Cart Added Successfully!!');
    }

    function index()
    {
        echo 'mehedi';
    }
}
