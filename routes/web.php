<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// FrontendController Start
Route::get('/', 'FrontendController@index')->name('index');
Route::get('about-us', 'FrontendController@about')->name('about');
Route::get('blog', 'FrontendController@blog')->name('blog');
Route::get('blog/detail/{slug}', 'FrontendController@blogdetail')->name('blog.detail');
Route::get('cart', 'FrontendController@cart')->name('cart');
Route::get('new/arrivals', 'FrontendController@newarraivals')->name('new.arraivals');
Route::get('contact', 'FrontendController@contact')->name('contact');
Route::post('contact/post', 'FrontendController@contactpost')->name('contact.post');
Route::get('user/account', 'FrontendController@useraccount')->name('user.account');
Route::get('update/user/account', 'FrontendController@useraccountupdate')->name('user.account.update');
Route::get('user/order', 'FrontendController@userorder')->name('user.order');
Route::get('user/order/detail/{id}', 'FrontendController@userorderdetail')->name('user.order.detail');
Route::get('privecy-&-policy', 'FrontendController@privecypolicy')->name('privecy.policy');
Route::get('return-&-refund', 'FrontendController@returnrefund')->name('return.refund');
Route::get('terms-&-conditions', 'FrontendController@termsconditions')->name('terms.conditions');
Route::get('product/detail/{slug}', 'FrontendController@productdetail')->name('product.detail');
Route::get('user/register', 'FrontendController@userregister')->name('user.register');
Route::post('user/register/post', 'FrontendController@userregisterpost')->name('user.register.post');
Route::get('wishlist', 'FrontendController@wishlist')->name('wishlist');
Route::post('/review/post', 'FrontendController@reviewpost')->name('review.post');
Route::post('/comment/post', 'FrontendController@commentpost')->name('comment.post');
Route::get('category/{name}', 'FrontendController@singleCategory')->name('single.category');
Route::get('/get/subcategory/{name}', 'FrontendController@singleSubCategory')->name('single.subcategory');
Route::get('product/brand/{name}', 'FrontendController@productbrand')->name('product.brand.filter');
Route::post('/product/filter/from/price', 'FrontendController@filterfromprice');
Route::get('/product/filtering/{soryby}', 'FrontendController@productfiltering')->name('product.filtering');
// FrontendController End
// ProfileController Start

Route::post('/profile/photo/update', 'ProfileController@updateprofilephoto')->name('update.profile.photo');
Route::post('/profile/update/name', 'ProfileController@updateprofilename')->name('update.profile.name');
Route::post('/profile/update/password', 'ProfileController@updateprofilepassword')->name('update.profile.password');
// ProfileController ends
// FilterController Start
Route::get('search', 'FilterController@search')->name('search');

Route::get('/shop/filter/category/{name}', [App\Http\Controllers\FilterController::class, 'shopfiltercategory'])->name('shop.filter.category');
Route::get('/shop/filter/brand/{brandName}', [App\Http\Controllers\FilterController::class, 'shopfilterbrand'])->name('shop.filter.brand');
Route::get('/shop/filter/categories/{name}', [App\Http\Controllers\FilterController::class, 'shopfiltercategories'])->name('shop.filter.categories');
Route::get('/shop/filter/new/product', [App\Http\Controllers\FilterController::class, 'shopfilternewst'])->name('shop.filter.newst');
Route::get('/shop/filter/new/highest', [App\Http\Controllers\FilterController::class, 'shopfilterhight'])->name('shop.filter.highest');
Route::get('/shop/filter/new/lowest', [App\Http\Controllers\FilterController::class, 'shopfilterlowest'])->name('shop.filter.lowest');
Route::get('/product/filter', [App\Http\Controllers\FilterController::class, 'productfilter'])->name('product.filter');
// FilterController ends


// CheckoutController Start
Route::get('checkout', 'CheckoutController@checkout')->name('checkout');
Route::post('checkout/store', 'CheckoutController@checkoutstore')->name('checkout.store');
// CheckoutController ends

Route::get('/social-shares', 'SocialShareController@shareButtons');




Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
Route::post('/admin/delete/{id}', 'HomeController@admindelete')->name('admin.delete');
Route::get('/update/profile', 'HomeController@updateprofile')->name('update.profile');
Route::post('/update/admin/photo', 'HomeController@updateadminphoto')->name('update.admin.photo');
Route::post('/update/admin/password', 'HomeController@updateadminpassword')->name('update.admin.password');
Route::post('/update/admin/name', 'HomeController@updateadminname')->name('update.admin.name');
Route::get('/contact/message', 'HomeController@message')->name('contact.message');
Route::post('/contact/message/delete/{id}', 'HomeController@messagedelete')->name('contact.message.delete');




Route::get('/dashboard/orders', 'OrderController@orderindex')->name('order.index');
Route::get('/dashboard/orders/details/{id}', 'OrderController@ordershow')->name('order.show');
Route::post('/dashboard/orders/done/{id}', 'OrderController@orderdone')->name('order.done');


// SettingController Start
Route::get('admin/settings', 'SettingController@index')->name('setting.index');
Route::post('admin/settings/logo/update', 'SettingController@update')->name('setting.update');
// SettingController ends


//Category Controller start

Route::get('category/status/{id}/{status}', 'CategoryController@status')->name('category.status');
Route::get('category/feature/{id}/{status}', 'CategoryController@feature')->name('category.feature');
Route::resource('dashboard/category', 'CategoryController');
//Category Controller end

            //------------ SUB CATEGORY ------------
            Route::get('subcategory/status/{id}/{status}', 'SubCategoryController@status')->name('admin.subcategory.status');
            Route::resource('subcategory', 'SubCategoryController', ['as' => 'admin', 'except' => 'show']);

//BrandController start
Route::get('brand/status/{id}/{status}/{type}', 'BrandController@status')->name('brand.status');
Route::resource('brand', 'BrandController');
//BrandController ends

// ProductController Start
Route::get('product/add', 'ProductController@add')->name('product.add');
Route::get('product/status/{product}/{status}', 'ProductController@status')->name('product.status');
Route::get('product/type/{product}/{type}', 'ProductController@type')->name('product.type');
Route::get('stock/out/product', 'ProductController@stockOut')->name('product.stock.out');
Route::resource('product', 'ProductController');
Route::post('get/product/subcategory', 'ProductController@getsubCategory')->name('admin.get.subcategory');
Route::get('product/galleries/{product}', 'ProductController@galleries')->name('product.gallery');
Route::post('product/galleries/update', 'ProductController@galleriesUpdate')->name('product.galleries.update');
Route::get('product/gallery/{gallery}/delete', 'ProductController@galleryDelete')->name('product.gallery.delete');
// ProductController ends

//BrandController start
Route::get('banner/status/{id}/{status}/{type}', 'BannerController@status')->name('banner.status');
Route::resource('banner', 'BannerController');
//BrandController ends

//BlogCategoryController start
Route::get('bcategory/status/{id}/{status}', 'BlogCategoryController@status')->name('bcategory.status');
Route::resource('bcategory', 'BlogCategoryController');
//BlogCategoryController ends

//BlogController start
Route::resource('admin/blog', 'BlogController');
Route::get('blog/delete/{key}/{id}', 'BlogController@delete')->name('blog.photo.delete');
//BlogController ends

//TeamController start
Route::resource('admin/team', 'TeamController');
//TeamController ends


//DisplaysliderController start
Route::resource('admin/display/slider', 'DisplaysliderController');
//DisplaysliderController ends


//InstagramController start
Route::resource('admin/instagram', 'InstagramController');
//InstagramController ends

//InstagramController start
Route::resource('admin/latest', 'LproductController');
//InstagramController ends




// WishlistController Start
Route::get('/wishlist/store/{id}', 'WishlistController@store')->name('wishlist.store');
Route::get('/wishlist/delete/{id}', 'WishlistController@delete')->name('wishlist.delete');
// WishlistController ends


// CartController start
Route::resource('product/cart-add', 'CartController');

Route::get('product/cart/delete/{id}', 'CartController@cartdelete')->name('cart-add.delete');
Route::post('product/cart/update', 'CartController@cartupdate')->name('cart-add.update');


// stripe payment method start
Route::get('stripe', 'StripePaymentController@stripe')->name('stripe.index');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
// stripe payment method end




// SSLCOMMERZ Start
Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index')->name('ssl.payment');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END
