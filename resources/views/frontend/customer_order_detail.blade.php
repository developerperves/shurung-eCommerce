@extends('layouts.frontendApp')
@section('title')
    My Order Detail | SHURUNG
@endsection
@section('frontendContent')
    
    <!-- breadcrumb section -->
    <div class="custom-breadcrumb custom-breadcrumb--minimal">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.order') }}">Order</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order details</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- main content section -->
    <div class="main-content pb-150">
        <!-- dashboard section -->
        <div class="container">
            <div class="dashboard">
                <div class="row">
                    <!-- dashboard controls -->
                    <div class="col-lg-3 col-md-6 dashboard__control">
                        <ul class="list-no-style">
                            <li class="control_item">
                                <a href="{{ route('user.account') }}">
                                    <span><i class="icon-user"></i></span>My account</a>
                            </li>
                            {{-- <li class="control_item">
                                <a href="address.html">
                                    <span><i class="icon-list"></i></span>My address</a>
                            </li> --}}
                            <li class="control_item active">
                                <a href="{{ route('user.order') }}">
                                    <span><i class="icon-basket"></i></span>My orders</a></li>
                            {{-- <li class="control_item"><a href="change-pass.html">
                                    <span><i class="icon-lock"></i></span>Reset
                                    Password</a>
                            </li> --}}
                            <li class="control_item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" style="border: none; background: none;">
                                        <span><i class="icon-exit"></i></span>Log
                                        out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- end dashboard controls -->
                    <!-- dashboard information profile section -->
                    <div class="col-lg-9 dashboard__info">
                        <div class="panel panel-box light-bg">
                            <div class="panel-heading">
                                <h3 class="panel-title">My Orders</h3>
                            </div>
                            <div class="order-table order-table__collapse">
                                <div class="order-table__head">
                                    <div class="order-table__row order-table__row--head">
                                        <div class="order-table__cell order-table__cell--item">Item</div>
                                        <div class="order-table__cell order-table__cell--quantity">quantity</div>
                                        <div class="order-table__cell order-table__cell--unit-price">Price</div>
                                        <div class="order-table__cell order-table__cell--total-price">Total</div>
                                        <div class="order-table__cell order-table__cell--discount">Discount</div>
                                        <div class="order-table__cell order-table__cell--final-price">Final price</div>
                                        <div class="order-table__cell order-table__cell--actions">Actions</div>
                                    </div>
                                </div>
                                <div class="order-table__body">
                                    @foreach ($order_info as $info)
                                    <div class="order-table__row">
                                        <div class="order-table__cell order-table__cell--item">
                                            <div class="order-table__cell--heading">Item</div>
                                            <div class="order-table__cell--content">
                                                <div class="order-table__product">
                                                    <a href="{{ route('product.detail', $info->product->slug) }}" class="product-img"><img
                                                            src="{{ asset('assets/images') }}/{{ $info->product->photo }}" alt="{{ $info->product->photo }}"> </a>
                                                    <a href="{{ route('product.detail', $info->product->slug) }}" class="product-title">
                                                        <h5>{{ $info->product->name }}</h5>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-table__cell order-table__cell--quantity">
                                            <div class="order-table__cell--heading">quantity</div>
                                            <div class="order-table__cell--content">
                                                {{ $info->product_quantity}}
                                            </div>
                                        </div>
                                        <div class="order-table__cell order-table__cell--unit-price">
                                            <div class="order-table__cell--heading">Price</div>
                                            <div class="order-table__cell--content">TK. {{ $info->product_price }}</div>
                                        </div>
                                        <div class="order-table__cell order-table__cell--total-price">
                                            <div class="order-table__cell--heading">Total</div>
                                            <div class="order-table__cell--content">TK. {{  ($info->product_quantity) * ($info->product_price) }}</div>
                                        </div>
                                        <div class="order-table__cell order-table__cell--discount">
                                            <div class="order-table__cell--heading">Discount</div>
                                            <div class="order-table__cell--content">
                                                @php
                                                    $discount = ($info->product->previous_price)-($info->product->discount_price)
                                                @endphp
                                                @if ($info->product->previous_price != null)
                                                    TK. {{  $discount*($info->product_quantity)  }}
                                                    @else
                                                    TK. 0
                                                @endif
                                            </div>
                                        </div>
                                        <div class="order-table__cell order-table__cell--final-price">
                                            <div class="order-table__cell--heading">Final price</div>
                                            <div class="order-table__cell--content">TK. {{  ($info->product_quantity) * ($info->product_price) }}</div>
                                        </div>
                                        <div class="order-table__cell order-table__cell--actions">
                                            <div class="order-table__cell--heading">Actions</div>
                                            <div class="order-table__cell--content">
                                                <a href="{{ route('new.arraivals') }}">Shop again</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end dashboard information profile section -->
            </div>
        </div>
    </div>
    <!-- end dashboard section -->
    <!-- end main content section -->
@endsection