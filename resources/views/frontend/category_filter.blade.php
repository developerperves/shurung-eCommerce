@extends('layouts.frontendApp')
@section('title')
    New Arraival | SHURUNG
@endsection
@section('frontendContent')
     <!-- hero header section -->
     <div class="hero-header hero-header--shop" style="background-image: url('{{ asset('assets/images') }}/{{ setting()->arraivle_bg }}')">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="hero-header__wrapper">
                        <div class="inner-content">
                            <h2 class="title">
                                <span class="title--md">{{ setting()->arraivle_title }}</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero header section -->
    <!-- breadcrumb section -->
    <div class="custom-breadcrumb custom-breadcrumb--minimal">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">new arraival</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- main content section -->
    <div class="main-content pb-150">
        <!-- shop collapse filters -->
        <div class="bs-canvas bs-canvas-left">
            <button type="button" class="bs-canvas-close close" aria-label="Close"><span aria-hidden="true">
                    <i class="fas fa-times"></i>
                </span>
            </button>
            <div class="collapse-filter">
                <div class="sidebar">
                    <div class="shop-widget">
                        <div class="widget shop-widget_category">
                            <h4 class="widget-title">
                                Categories
                            </h4>
                            <ul class="widget-list">
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-01">
                                        <label class="custom-control-label" for="br-01">
                                            Women
                                        </label>
                                    </span>
                                    <span class="badge">(10)</span>
                                </li>
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-02">
                                        <label class="custom-control-label" for="br-02">
                                            Men
                                        </label>
                                    </span>
                                    <span class="badge">(09)</span>
                                </li>
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-03">
                                        <label class="custom-control-label" for="br-03">
                                            Kids
                                        </label>
                                    </span>
                                    <span class="badge">(12)</span>
                                </li>
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-04">
                                        <label class="custom-control-label" for="br-04">
                                            Bags & Backpacks
                                        </label>
                                    </span>
                                    <span class="badge">(06)</span>
                                </li>
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-05">
                                        <label class="custom-control-label" for="br-05">
                                            Accessories</label>
                                    </span>
                                    <span class="badge">(11)</span>
                                </li>
                            </ul>
                        </div>
                        <div class="widget shop-widget_price">
                            <h4 class="widget-title">
                                Price
                            </h4>
                            <div class="range-slider">
                                <input type="text" class="js-range-slider" id="standard-price" value="" />
                                <div class="range-slider-label">
                                    <span>from $10</span>
                                    <span>to $1000</span>
                                </div>
                            </div>
                        </div>
                        <div class="widget shop-widget_color">
                            <h4 class="widget-title">
                                Color
                            </h4>
                            <ul class="widget-list">
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-06">
                                        <label class="custom-control-label" for="br-06">
                                            Red
                                        </label>
                                    </span>
                                    <span class="badge">(10)</span>
                                </li>
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-07">
                                        <label class="custom-control-label" for="br-07">
                                            Blue
                                        </label>
                                    </span>
                                    <span class="badge">(05)</span>
                                </li>
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-08">
                                        <label class="custom-control-label" for="br-08">
                                            Green
                                        </label>
                                    </span>
                                    <span class="badge">(15)</span>
                                </li>
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-09">
                                        <label class="custom-control-label" for="br-09">
                                            Black
                                        </label>
                                    </span>
                                    <span class="badge">(07)</span>
                                </li>
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-10">
                                        <label class="custom-control-label" for="br-10">
                                            Beige</label>
                                    </span>
                                    <span class="badge">(11)</span>
                                </li>
                            </ul>
                        </div>
                        <div class="widget shop-widget_product">
                            <h4 class="widget-title">
                                Product Type
                            </h4>
                            <ul class="widget-list">
                                <li class="widget-list_item">
                                    <a data-toggle="collapse" href="#product01" role="button">
                                        <span>Jackets</span>
                                        <span class="badge">(10)</span>
                                    </a>
                                    <ul class="collapse widget-list--nested" id="product01">
                                        <li><a href="#">Sport Jacket</a></li>
                                        <li><a href="#">Outdoor Jacket</a></li>
                                        <li><a href="#">Denim Jacket</a></li>
                                    </ul>
                                </li>
                                <li class="widget-list_item">
                                    <a data-toggle="collapse" href="#product02" role="button">
                                        <span>Shirts & Blouses</span>
                                        <span class="badge">(05)</span>
                                    </a>
                                    <ul class="collapse widget-list--nested" id="product02">
                                        <li><a href="#">Band collar</a></li>
                                        <li><a href="#">Crop top</a></li>
                                        <li><a href="#">Boat neck</a></li>
                                    </ul>
                                </li>
                                <li class="widget-list_item">
                                    <a data-toggle="collapse" href="#product03" role="button">
                                        <span>Dresses</span>
                                        <span class="badge">(24)</span>
                                    </a>
                                    <ul class="collapse widget-list--nested" id="product03">
                                        <li><a href="#">Short Dresses</a></li>
                                        <li><a href="#">Midi Dresses</a></li>
                                        <li><a href="#">Cocktail Dresses</a></li>
                                        <li><a href="#">Party Dresses</a></li>
                                        <li><a href="#">Lace Dresses</a></li>
                                        <li><a href="#">Shirt Dresses</a></li>
                                        <li><a href="#">Wrap Dresses</a></li>
                                    </ul>
                                </li>
                                <li class="widget-list_item">
                                    <a data-toggle="collapse" href="#product04" role="button">
                                        <span>Shoes</span>
                                        <span class="badge">(56)</span>
                                    </a>
                                    <ul class="collapse widget-list--nested" id="product04">
                                        <li><a href="#">High Heels</a></li>
                                        <li><a href="#">Sandals</a></li>
                                        <li><a href="#">Boots</a></li>
                                        <li><a href="#">Ankle Boots</a></li>
                                        <li><a href="#">Sneakers</a></li>
                                        <li><a href="#">Slippers</a></li>
                                        <li><a href="#">Flats</a></li>
                                    </ul>
                                </li>
                                <li class="widget-list_item">
                                    <a data-toggle="collapse" href="#product05" role="button">
                                        <span>Pants</span>
                                        <span class="badge">(45)</span>
                                    </a>
                                    <ul class="collapse widget-list--nested" id="product05">
                                        <li><a href="#">Leggings</a></li>
                                        <li><a href="#">Joggers</a></li>
                                        <li><a href="#">Flare</a></li>
                                        <li><a href="#">Dress Pants</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="widget shop-widget_brand">
                            <h4 class="widget-title">
                                Brands
                            </h4>
                            <ul class="widget-list">
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-11">
                                        <label class="custom-control-label" for="br-11">
                                            Mango
                                        </label>
                                    </span>
                                    <span class="badge">(20)</span>
                                </li>
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-12">
                                        <label class="custom-control-label" for="br-12">
                                            Zara
                                        </label>
                                    </span>
                                    <span class="badge">(32)</span>
                                </li>
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-13">
                                        <label class="custom-control-label" for="br-13">
                                            Bershka
                                        </label>
                                    </span>
                                    <span class="badge">(05)</span>
                                </li>
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="br-14">
                                        <label class="custom-control-label" for="br-14">
                                            H&M
                                        </label>
                                    </span>
                                    <span class="badge">(18)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end shop collapse filters -->
        <div class="container">
            <!-- shop tools -->
            <div class="shop-tools">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="shop-by-gender">
                            <a href="#" class="button button--secondary-outline"><i class="icon-woman"></i> Women</a>
                            <a href="#" class="button button--secondary-outline"><i class="icon-man"></i> Men</a>
                            <a href="#" class="button button--secondary-outline"><i class="icon-kid"></i> Kids</a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-12">
                        <form>
                            <div class="shop-sort">
                                <select class="form-control" id="sortFilter">
                                    <option selected>Sort By</option>
                                    <option>Newest</option>
                                    <option>Recommended</option>
                                    <option>Highest price</option>
                                    <option>Lowest price</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-md-4 col-12">
                        <div class="collapse-filter shop-filter-btn" id="SidefilterBtn">
                            <span class="pull-bs-canvas-left button button--secondary-outline">
                                <span>Filters</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end shop tolls -->
            <!-- shop list -->
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @forelse($products as $product)
                        <div class="col-lg-3 col-sm-6">
                            <div class="product-card product-card--block">
                                <div class="product-card__img">
                                    <a href="{{ route('product.detail', $product->slug) }}">
                                        <img src="{{ asset('assets/images') }}/{{ $product->photo }}" alt="{{ $product->photo }}">
                                    </a>
                                    <div class="product-card__overlay">
                                        @if ($product->previous_price != null)   
                                        <div class="product-badge">
                                            -{{ App\Helpers\PriceHelper::DiscountPercentage($product) }}
                                        </div>
                                        @endif
                                        <div class="product-actions">
                                            <ul class="product-btn-list">
                                                <li>
                                                    <a href="{{ route('product.detail', $product->slug) }}" class="product-btn"><i class="icon-eye"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="product-btn"><i class="icon-basket"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="product-btn"><i class="icon-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-card__body">
                                    <div class="product-category">{{ App\Brand::find($product->brand_id)->name }}</div>
                                    <h3 class="product-name">
                                        <a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="product-price">
                                        @if ($product->previous_price!=null)
                                        <del class="old">
                                            <span class="amount">TK.  {{ $product->previous_price }}</span></del>
                                        @endif
                                        <ins class="current ">
                                            <span class="amount">TK.  {{ $product->discount_price }}</span>
                                        </ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p>Product not found</p>
                        @endforelse
                    </div>
                    <!-- end shop cards -->
                    <!-- pagination -->
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination custom-pagination">
                                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                                class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- end pagination -->
                </div>
            </div>
            <!-- end shop list -->
        </div>
    </div>
    <!-- end main content section -->
@endsection