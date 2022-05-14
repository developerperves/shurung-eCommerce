<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Blog;
use App\Blogcomment;
use App\Contactmessage;
use App\DisplaySlider;
use App\Instagram;
use App\Lproduct;
use App\Message;
use App\Order;
use App\Orderdetails;
use App\Product;
use App\Team;
use App\Wishlist;
use App\Category;
use App\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Controllers\isAjax;
use App\Subcategory;
use App\User;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {

        $best_products = Product::where('is_type', 'best')->whereStatus(1)->orderby('id', 'desc')->take(12)->get();
        $new_products = Product::where('is_type', 'new')->whereStatus(1)->orderby('id', 'desc')->take(12)->get();

        return view('frontend.index', [
            'sliders' => Banner::latest()->get(),
            'best_products' => $best_products,
            'new_products' => $new_products,
            'blogs' => Blog::latest()->get(),
            'displays' => DisplaySlider::latest()->get(),
            'instagrams' => Instagram::latest()->get(),
        ]);
    }
    public function about()
    {
        $best_products = Product::where('is_type', 'best')->whereStatus(1)->orderby('id', 'desc')->take(4)->get();
        return view('frontend.about', [
            'teams' => Team::latest()->get(),
            'latest_product' => Lproduct::latest()->get(),
            'blogs' => Blog::latest()->get(),
            'best_products' => $best_products
        ]);
    }
    public function blog()
    {

        $tagz = '';
        $tags = null;
        $name = Blog::pluck('tags')->toArray();
        foreach ($name as $nm) {
            $tagz .= $nm . ',';
        }
        $tags = array_unique(explode(',', $tagz));

        return view('frontend.blog', [
            'blogs' => Blog::latest()->get(),
            'instagrams' => Instagram::latest()->get(),
            'sliders' => DisplaySlider::latest()->get(),
            'tags'       => array_filter($tags)
        ]);
    }
    public function blogdetail($slug)
    {
        $blog_info = Blog::where('slug', $slug)->first();
        $related_blog = Blog::where('id', '!=', $blog_info->id)->limit(4)->get();
        $tagz = '';
        $tags = null;
        $name = Blog::where('slug', $slug)->pluck('tags')->toArray();
        foreach ($name as $nm) {
            $tagz .= $nm . ',';
        }
        $tags = array_unique(explode(',', $tagz));
        $comment = Blogcomment::where('blog_id', $blog_info->id)->latest()->get();

        $socialShares = \Share::page(route('blog.detail', $slug))
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();
        return view('frontend.blog_detail', [
            'blog_info' => $blog_info,
            'related_blog' => $related_blog,
            'instagrams' => Instagram::latest()->get(),
            'tags' => array_filter($tags),
            'sliders' => DisplaySlider::latest()->get(),
            'comments' => $comment,
            'socialShares' => $socialShares,
        ]);
    }
    public function newarraivals()
    {
        return view('frontend.new_arraival', [
            'news' => Product::latest()->paginate(20)
        ]);
    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function contact()
    {
        return view('frontend.contact', [
            'instagrams' => Instagram::latest()->get(),
        ]);
    }
    public function useraccount()
    {
        return view('frontend.account');
    }
    public function userorder()
    {
        return view('frontend.customer_order', [
            'orders' => Order::where('user_id', Auth::id())->orderby('created_at', 'desc')->paginate(10),
        ]);
    }
    public function userorderdetail($id)
    {
        return view('frontend.customer_order_detail', [
            'order_info' =>  Orderdetails::where('order_id', $id)->get(),
        ]);
    }
    public function privecypolicy()
    {
        return view('frontend.privecy_&_policy');
    }
    public function productdetail($slug)
    {
        $product = Product::with('category')->whereStatus(1)->whereSlug($slug)->firstOrFail();
        $show_review_form = 0;

        if (Orderdetails::where('user_id', Auth::id())->where('product_id', $product->id)->whereNull('review')->exists()) {
            $order_detail_id = Orderdetails::where('user_id', Auth::id())->where('product_id', $product->id)->whereNull('review')->first()->id;
            $show_review_form = 1;
        } else {
            $order_detail_id = 0;
            $show_review_form = 2;
        }
        $reviews = Orderdetails::where('product_id', $product->id)->whereNotNull('review')->latest()->get();
        return view('frontend.product_detail', [
            'product'          => $product,
            'galleries'     => $product->galleries,
            'sec_name'      => isset($product->specification_name) ? json_decode($product->specification_name, true) : [],
            'sec_details'   => isset($product->specification_description) ? json_decode($product->specification_description, true) : [],
            'related_products' => $product->category->products()->whereStatus(1)->where('id', '!=', $product->id)->take(4)->get(),
            'sec_name'      => isset($product->specification_name) ? json_decode($product->specification_name, true) : [],
            'sec_details'   => isset($product->specification_description) ? json_decode($product->specification_description, true) : [],
            'show_review_form' => $show_review_form,
            'order_detail_id' => $order_detail_id,
            'reviews' => $reviews,
        ]);
    }
    public function userregister()
    {
        return view('frontend.user_register');
    }
    public function userregisterpost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        if ($request->password == $request->password_confirmation) {
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 2,
                'created_at' => Carbon::now(),
            ]);
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            if (cart_count() > 0) {
                return redirect('checkout');
            } else {
                return redirect('user/account');
            }
        } else {
            return back()->withErrors("The password and confirmation password doesn't match.");
        }
    }
    public function returnrefund()
    {
        return view('frontend.return_&_refund');
    }
    public function termsconditions()
    {
        return view('frontend.terms_&_conditions');
    }
    public function wishlist()
    {
        return view('frontend.wishlist');
    }
    public function contactpost(Request $request)
    {
        Message::insert($request->except('_token') + [
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Form submitted successfully🙂');
    }
    public function useraccountupdate()
    {
        return view('frontend.update_account');
    }
    function reviewpost(Request $request)
    {
        Orderdetails::find($request->order_detail_id)->update([
            'stars' => $request->stars,
            'review' => $request->review,
        ]);
        return back()->withSuccess('Thanks for your review.');
    }
    public function commentpost(Request $request)
    {
        Blogcomment::insert($request->except('_token') + [
            'created_at' => Carbon::now()
        ]);

        return back()->withSuccess('Comment successful.');
    }

    public function singleCategory($slug)
    {

        $categoryId = Category::where('slug', $slug)->first()->id;
        $news = Product::where('category_id', $categoryId)->latest()->paginate(20);
        if (request()->ajax()) {
            return response()->json([
                'newarrivaleProduct' => view('frontend.includes.newarrivaleProduct')->with('news', $news)->render()
            ]);
        } else {
            return view('frontend.new_arraival', [
                'news' => $news,
            ]);
        }
    }
    public function singleSubCategory($slug)
    {

        $subCategoryId = Subcategory::where('slug', $slug)->first()->id;
        $news = Product::where('subcategory_id', $subCategoryId)->latest()->paginate(20);
        if (request()->ajax()) {
            return response()->json([
                'newarrivaleProduct' => view('frontend.includes.newarrivaleProduct')->with('news', $news)->render()
            ]);
        } else {
            return view('frontend.new_arraival', [
                'news' => $news,
            ]);
        }
    }
    public function productbrand($slug)
    {
        $brandId = Brand::where('slug', $slug)->first()->id;
        $news = Product::where('brand_id', $brandId)->latest()->paginate(20);

        return view('frontend.new_arraival', [
            'news' => $news,
        ]);
    }

    public function filterfromprice(Request $request)
    {

        $news =  Product::where('discount_price', '>=', $request->minprice)->where('discount_price', '<=', $request->maxprice)
            ->orderBy('discount_price', 'desc')
            ->latest()->paginate(20);
        if (request()->ajax()) {
            return response()->json([
                'newarrivaleProduct' => view('frontend.includes.newarrivaleProduct')->with('news', $news)->render()
            ]);
        } else {
            return view('frontend.new_arraival', [
                'news' => $news,
            ]);
        }
    }


    public function productfiltering($sortby)
    {

        $news = Product::all();
        if ($sortby == 'new') {
            $news = Product::latest()->paginate(20);
        } else if ($sortby == 'lowest') {
            $news = Product::orderBy('discount_price', 'ASC')->paginate(20);
        } else if ($sortby == 'recommended') {
            $news = $news = Product::where('is_type', 'best')->latest()->paginate(20);
        } else {
            $news = Product::orderBy('discount_price', 'DESC')->latest()->paginate(20);
        }

        if (request()->ajax()) {
            return response()->json([
                'newarrivaleProduct' => view('frontend.includes.newarrivaleProduct')->with('news', $news)->render()
            ]);
        } else {
            return view('frontend.new_arraival', [
                'news' => $news
            ]);
        }
    }
}
