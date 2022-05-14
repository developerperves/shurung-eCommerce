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
                            <ul class="widget-list scroll-x">
                                @foreach (categories() as $category)
                                <li class="widget-list_item">
                                    <a href="{{ route('single.category',$category->slug) }}">
                                           {{ $category->name }}
                                    </a>
                                    <span class="badge">({{ CategoryCount($category->id) }})</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="range-slider">
                            <input type="text" class="js-range-slider" id="standard-price" value="" />
                            <div class="range-slider-label">
                                <span>from $10</span>
                                <span>to $1000</span>
                            </div>
                            <span class="btn btn-info"  onclick="PriceFilter()">Filter</span>
                        </div>
                        <div class="widget shop-widget_brand">
                            <h4 class="widget-title">
                                Brands
                            </h4>
                            <ul class="widget-list scroll-x">
                                @foreach ( brands() as $brand)
                                <li class="widget-list_item">
                                    <span class="custom-control custom-checkbox">
                                       <a href="{{ route('product.brand.filter',$brand->slug) }}">   {{ $brand->name }}</a>
                                    </span>
                                    <span class="badge">({{ brandcount($brand->id) }})</span>
                                </li> 
                                @endforeach
                                
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
                        <div class="shop-by-gender" id="fourCategory">
                          @include('frontend.includes.fourCategory')
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-12">
                        <form>
                            <div class="shop-sort">
                                <select class="form-control" id="sortFilter">
                                    <option selected>Sort By</option>
                                    <option value='new'>Newest</option>
                                    <option value='recommended'>Recommended</option>
                                    <option value='highest'>Highest price</option>
                                    <option value='lowest'>Lowest price</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-md-4 col-12">
                        <div class="collapse-filter shop-filter-btn" id="SidefilterBtn">
                            <span class="pull-bs-canvas-left button button--secondary-outline">
                                <span>Filters </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end shop tolls -->
            <!-- shop list -->
            <div class="row" id="newarrivaleProduct">
             @include('frontend.includes.newarrivaleProduct')
            </div>
            <!-- end shop list -->
        </div>
    </div>
    <!-- end main content section -->
@endsection
