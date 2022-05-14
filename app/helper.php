<?php

use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;



function cart_count()
{
    return App\Cart::where('generated_cart_id', Cookie::get('g_cart_id'))->count();
}

function cart_items()
{
    return App\Cart::where('generated_cart_id', Cookie::get('g_cart_id'))->get();
}
function wish_items()
{
    return App\Wishlist::where('user_id', Auth::id())->latest()->get();
}


function setting()
{
    return App\Setting::find(1);
}
function categorrey()
{
    return App\Category::latest()->get();
}


function average_stars($product_id)
{
    $customer_review = App\Orderdetails::where('product_id', $product_id)->whereNOtNull('review')->count();
    $sum_stars = App\Orderdetails::where('product_id', $product_id)->whereNOtNull('review')->sum('stars');
    if ($sum_stars == 0) {
        return 0;
    } else {
        return round($sum_stars / $customer_review);
    }
}

function categorreyFour()
{
    return App\Category::latest()->take(4)->get();
}

function categories()
{
    return App\Category::latest()->get();
}

function brands()
{
    return App\Brand::latest()->get();
}
function CategoryCount($categoryId)
{
    return App\Product::where('category_id', $categoryId)->get()->count();
}


function brandcount($brand_id)
{
    return App\Product::where('brand_id', $brand_id)->get()->count();
}
function review_user_name($id)
{
        return App\User::find($id)->photo;
}