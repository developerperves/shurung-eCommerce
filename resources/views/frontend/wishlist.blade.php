@extends('layouts.frontendApp')
@section('title')
    Wishlist | SHURUNG
@endsection
@section('frontendContent')
    <!-- page header image section -->
    <div class="page-header-img" style="background-image: url('{{ asset('assets/images') }}/{{ setting()->wish_banner_bg }}')">
        <div class="container">
            <div class="page-header-img__wrapper">
                <h2 class="page-title">{{ setting()->wish_banner_heading }}</h2>
            </div>
        </div>
    </div>
    <!-- end page header image section -->
    <!-- breadcrumb section -->
    <div class="custom-breadcrumb custom-breadcrumb--minimal">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- main content section -->
    <div class="main-content pb-150">
        <!-- cart section -->
        <div class="container">
            <!-- wishlist -->
            <table class="shop_table">
                <thead class="shop_table_head">
                    <tr>
                        <th class="product-thumbnail">Product</th>
                        <th class="product-name">Name</th>
                        <th class="product-price">Price</th>
                        <th class="product-status">Stuck status</th>
                        <th class="product-actions"></th>
                    </tr>
                </thead>
                <tbody class="shop_table_body">
                    @forelse (wish_items() as $wish_items)
                    <tr class="product_item">
                        <td class="product-thumbnail">
                            <a href="{{ route('product.detail', $wish_items->thisproduct->slug) }}" class="product-img"><img src="{{ asset('assets/images') }}/{{ $wish_items->thisproduct->photo }}" alt="{{ $wish_items->thisproduct->photo }}"></a>
                        </td>
                        <td class="product-name" data-title="Name">
                            <span class="product-category"></span>
                            <a href="{{ route('product.detail', $wish_items->thisproduct->slug) }}">{{ $wish_items->thisproduct->name }}</a>
                        </td>
                        <td class="product-price">
                            @if ($wish_items->thisproduct->previous_price != null)
                            <del class="old">
                                <span class="amount">TK. {{ $wish_items->thisproduct->previous_price }}</span></del>
                            @endif
                            <ins class="current">
                                <span class="amount">TK. {{ $wish_items->thisproduct->discount_price }}</span></ins>
                        </td>
                        @if ($wish_items->thisproduct->stock != 0)
                        <td class="product-status" data-title="Status">
                            in stuck
                        </td>
                        @else
                        <td class="product-status" data-title="Status">
                            Out of stuck
                        </td>
                        @endif
                        <td class="product-actions" data-title="Status">
                            <form action="{{ route('cart-add.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="productId" value="{{ $wish_items->thisproduct->id }}">
                                <input type="hidden" name="product_quantity" value="1">
                                <button type="submit" class="button button--dark">Add to cart</button>
                            </form>
                            <form action="{{ route('wishlist.delete', $wish_items->id) }}">
                                @csrf
                                <button type="submit" class="button button--dark-outline">Remove from list</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
            <!-- end wishlist -->
        </div>
        <!-- end cart section -->
    </div>
    <!-- end main content section -->
@endsection