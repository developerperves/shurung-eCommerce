@extends('layouts.frontendApp')
@section('title')
    Cart | SHURUNG
@endsection
@section('frontendContent')
    
    <!-- breadcrumb section -->
    <div class="custom-breadcrumb custom-breadcrumb--minimal">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- main content section -->
    <div class="main-content pb-150">
        <!-- cart section -->
        <div class="container">
            <div class="cart-section">
                <!-- cart form -->
                <div class="cart-form">
                    {{-- <form> --}}
                        <!-- main title -->
                        <div class="heading">
                            <h3 class="main-heading">cart</h3>
                        </div>
                        <!-- end main title -->
                        <div class="row">
                            <!-- cart table -->
                            <div class="col-lg-8">
                                <div class="cart-form__left">
                                    @if ($errors->any())
              <div class="col-lg-12">
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                     
                    </div>
                  </div>
                @endif
                                    <form action="{{ route('cart-add.update') }}" method="post">
                                        @csrf
                                    <!-- update cart button -->
                                    {{-- <div class="update-header-cart">
                                        <button type="submit" class="button button--link">Update cart</button>
                                    </div> --}}
                                    <!-- end update cart button -->
                                    <!-- cart table list -->
                                    <table class="shop_table cart_table">
                                        <thead class="shop_table_head">
                                            <tr>
                                                <th class="product-remove">&nbsp;</th>
                                                <th class="product-thumbnail">Product</th>
                                                <th class="product-name">Name</th>
                                                <th class="product-price">price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="shop_table_body">
                                            @foreach (cart_items() as $cart_item)
                                            <tr class="product_item">
                                                <td class="product-remove">
                                                    <a href="{{ route('cart-add.delete',$cart_item->id) }}"> <i class="fa fa-times"></i></a></td>
                                                <td class="product-thumbnail">
                                                    <a href="#" class="product-img"><img
                                                            src="{{ asset('assets/images/' . $cart_item->product->photo) }}" alt=""></a>
                                                </td>
                                                <td class="product-name" data-title="Name">
                                                    <a href="#">{{ $cart_item->product->name }}</a>
                                                </td>
                                                <td class="product-price">
                                                    <del class="old">
                                                        <span class="amount">TK. {{  $cart_item->product->previous_price }}</span>
                                                    </del>
                                                    <ins class="current ">
                                                        <span class="amount">TK. {{ $cart_item->product->discount_price }}</span>
                                                    </ins>
                                                </td>
                                                <td class="product-quantity" data-title="Quantity">
                                                    <div class="quantity-input">
                                                        <input class="quantity__input" name="product_quantity[{{ $cart_item->id }}]" type="number" value="{{ $cart_item->product_quantity }}" />
                                                        <span class="quantity__minus"><i
                                                                class="fas fa-chevron-down"></i></span>
                                                        <span class="quantity__plus"><i
                                                                class="fas fa-chevron-up"></i></span>

                                                    </div>
                                                </td>
                                                <td class="product-subtotal" data-title="Total">
                                                    <span class="amount">TK. {{  $cart_item->product_quantity * ($cart_item->product->discount_price) }}</span></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="update-header-cart">
                                        <button type="submit" class="button button--link">Update cart</button>
                                    </div>
                                    <!-- end cart table list -->
                                </form>
                                </div>
                            </div>
                            <!-- end cart table -->
                            <!-- cart total information -->
                            <div class="col-lg-4">
                                <div class="cart-form__right">
                                    <!-- coupon form -->
                                    <div class="coupon-form custom-form">
                                        {{-- <div class="input-wrapper">
                                            <input type="text" class="form-control" placeholder="Enter coupon">
                                            <label class="form-control-label">Enter
                                                coupon</label>
                                            <button type="submit" class="button submit_btn">
                                                <span aria-hidden="true" class="fa fa-chevron-right"></span>
                                            </button>
                                        </div>
                                    </div> --}}
                                    <!-- end coupon form -->
                                    <!-- cart total details -->
                                    <div class="cart_totals">
                                        <div class="expenses">
                                            <span>Total</span>
                                            <span class="price">
                                                TK.  {{ session('cart_subtitle') }}
                                            </span>
                                        </div>
                                        {{-- <div class="total-price">
                                            <span>Total</span>
                                            <span class="price">$320.00</span>
                                        </div> --}}
                                        <a href="{{ route('checkout') }}" class="button button--dark button-block">Check out</a>
                                    </div>
                                    <!-- end cart total details -->
                                </div>
                            </div>
                            <!-- end cart total information -->
                        </div>
                </div>
                <!-- end cart form -->
            </div>
        </div>
        <!-- end cart section -->
    </div>
    <!-- end main content section -->
@endsection