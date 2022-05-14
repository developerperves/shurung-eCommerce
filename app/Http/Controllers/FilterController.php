<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class FilterController extends Controller
{
    public function search()
    {
        $search_product = QueryBuilder::for(Product::class)
            ->allowedFilters('name')
            ->get();

        return view('frontend.search', compact('search_product'));
    }

    public function shopfiltercategory($name)
    {
        $category = Category::where('name', $name)->first()->id;
        return view('frontend.shop', [
            'products' => Product::where('category_id', $category)->latest()->get(),
        ]);
    }
    public function shopfiltercategories($name)
    {

        $category = Category::where('name', $name)->first()->id;
        return view('frontend.shop', [
            'products' => Product::where('category_id', $category)->latest()->get(),
        ]);
    }
    public function shopfilterbrand($brandName)
    {

        $brandId = Brand::where('brandName', $brandName)->first()->id;

        return view('frontend.shop', [
            'categories' => Category::latest()->get(),
            'products' => Product::where('brand', $brandId)->latest()->get(),
            'brands' => Brand::latest()->get(),
            'category4' => Category::latest()->limit(4)->get(),
            'addresses' => Address::all(),
            'socials' => Social::all(),
            'logoTop' => Updateimage::find(1),
            'logoBottom' => Updateimage::find(2),
            'banner' => Updateimage::find(3),
        ]);
    }
    public function shopfilternewst()
    {

        return view('frontend.shop', [
            'categories' => Category::latest()->limit(4)->get(),
            'products' => Product::latest()->get(),
        ]);
    }
    public function shopfilterhight()
    {

        return view('frontend.shop', [
            'categories' => Category::latest()->limit(4)->get(),
            'products' => Product::orderBy('productPrice', 'desc')->get(),
        ]);
    }
    public function shopfilterlowest()
    {
        // 'products' => Product::all()->sortBy("productPrice")
        $categories = [1, 2, 5,];

        foreach ($categories as $category) {
            # code...
        }
        foreach (Product::where('productPrice', '>=', '100')->where('productPrice', '<=', '110')
            ->orderBy('productPrice', 'desc')
            ->get() as $value) {

            print_r($value->where('category', 5) . '<br/>');
        }
        return view('frontend.shop', [
            'categories' => Category::latest()->limit(4)->get(),
            'products' => Product::all()->sortBy("productPrice"),
        ]);
    }
    public function productfilter()
    {


        $products = QueryBuilder::for(Product::class)
            ->allowedFilters(['category'])
            ->allowedSorts('category')
            ->get();
        print_r($products);
        return view('frontend.search', compact('products'));
    }

    public function categoryname($id)
    {
        $category = Category::where('id', $id)->first();
        return view('frontend.category_filter', [
            'products' => Product::where('category_id', $id)->latest()->paginate(10),
            'category' => $category,
        ]);
    }
}
