@extends('layouts.frontendApp')
@section('title')
    SHURUNG
@endsection
@section('frontendContent')
    
    <!-- hero header section -->
    <div class="hero-header hero-header--carousel" id="heroHeaderCarousel">
        @foreach ($sliders as $slider)
        <div class="hero-header-bg" style="background-image: url('{{ asset('assets/images/' . $slider->photo) }}')">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hero-header__wrapper">
                            <div class="inner-content slider-animated">
                                <div class="slider-title slider-title--light slider-title--style-2">
                                    <h3 class="slider-subtitle animated">{{ $slider->heading_one }}</h3>
                                    <h1 class="slider-main-title animated">{{ $slider->heading_two }}</h1>
                                </div>
                                <div class="slider-text animated">
                                    <p>{{ $slider->description }}</p>
                                </div>
                                <a href="{{ route('new.arraivals') }}" class="button button--dark button-lg slider-btn animated">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- end hero header section -->

    




    <!-- main content section -->
    <div class="main-content pt-30">
        <div class="container">
            <!-- product banner section -->
            <div class="banner simple-banner">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="banner-slider slider-boxed banner-slider--mb">
                            @foreach ($displays as $display)
                            <div class="banner-item img-hover-1">
                                <img src="{{ $display->photo ?  asset('assets/images/'.$display->photo) : asset('assets/images/placeholder.png')}}" alt="No Photo found">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="banner-item banner-item-full-height">
                            <div class="banner-item-bg" style="background-image: url('{{ setting()->new_collection_banner ?  asset('assets/images/'.setting()->new_collection_banner) : asset('assets/images/placeholder.png')}}">
                            </div>
                            <div class="banner-img">
                                <img src="{{ setting()->new_collection_banner ?  asset('assets/images/'.setting()->new_collection_banner) : asset('assets/images/placeholder.png')}}" alt="No photo found">
                            </div>
                            <div class="banner-text-wrapper banner-text-wrapper--center">
                                <h4 class="banner-title"><span class="banner-title--large">New</span><br> Collection
                                </h4>
                                <div class="banner-btn">
                                    <a href="{{ route('new.arraivals') }}" class="button button--link">See all products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end product banner section -->


            <!-- best seller products section -->
            <div class="pt-150">
                <!-- main title -->
                <div class="row">
                    <div class="col-12">
                        <div class="heading">
                            <h2 class="main-heading">{{ setting()->best_product_heading }}</h2>
                            <a href="{{ route('new.arraivals') }}" class="heading-link">Show All</a>
                        </div>
                    </div>
                </div>
                <!-- end main title -->
                <!-- product cards -->
                <div class="row">
                    @foreach ($best_products as $best)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-card product-card--block">
                            <div class="product-card__img">
                                <a href="{{ route('product.detail', $best->slug) }}">
                                    <img src="{{ asset('assets/images/' . $best->photo) }}" alt="photo no found">
                                </a>
                                <div class="product-card__overlay">
                                    @if ($best->previous_price != null)   
                                    <div class="product-badge">
                                        -{{ App\Helpers\PriceHelper::DiscountPercentage($best) }}
                                    </div>
                                    @endif
                                    <div class="product-actions">
                                        <ul class="product-btn-list">
                                            <li>
                                                <a href="{{ route('product.detail', $best->slug) }}" class="product-btn"><i class="icon-eye"></i></a>
                                            </li>
                                            @if ($best->is_stock())
                                            <li>
                                                <form action="{{ route('cart-add.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="productId" value="{{ $best->id }}">
                                                    <input type="hidden" name="product_quantity" value="1">
                                                <button class="product-btn addToCart border-0"><i class="icon-basket"></i></button>
                                            </form>
                                            </li>
                                            @endif
                                            <li>
                                                @if(App\Wishlist::where('user_id','=',Auth::id())->where('item_id','=',$best->id)->exists())
                                                <a href="{{ route('wishlist.delete', $best->id) }}" class="product-btn wishlist_store colorChange" style="background-color: #FF6363; color: white;" title="{{__('Wishlist')}}"><i class="icon-heart"></i></a>
                                                @else
                                                <a href="{{ route('wishlist.store', $best->id) }}" class="product-btn wishlist_store colorChange"  title="{{__('Wishlist')}}"><i class="icon-heart"></i></a>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__body">
                                <div class="product-category">{{ App\Category::find($best->category_id)->name }}</div>
                                <h3 class="product-name">
                                    <a href="{{ route('product.detail', $best->slug) }}">{{ $best->name }}</a>
                                </h3>
                                <div class="product-price">
                                    @if ($best->previous_price!=null)
                                    <del class="old">
                                        <span class="amount">TK.  {{ $best->previous_price }}</span></del>
                                    @endif
                                    <ins class="current ">
                                        <span class="amount">TK.  {{ $best->discount_price }}</span>
                                    </ins>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- end product cards -->
            </div>
            <!-- end best seller products section -->

            <!-- new products section -->
            <div class="pt-150">
                <!-- main title -->
                <div class="row">
                    <div class="col-12">
                        <div class="heading">
                            <h2 class="main-heading">{{ setting()->new_product_heading }}</h2>
                            <a href="{{ route('new.arraivals') }}" class="heading-link">Show All</a>
                        </div>
                    </div>
                </div>
                <!-- end main title -->
                <!-- product cards -->
                <div class="row">
                    @foreach ($new_products as $new)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-card product-card--block">
                            <div class="product-card__img">
                                <a href="{{ route('product.detail', $new->slug) }}">
                                    <img src="{{ asset('assets/images/' . $new->photo) }}" alt="photo no found">
                                </a>
                                <div class="product-card__overlay">
                                    @if ($new->previous_price != null)   
                                    <div class="product-badge">
                                        -{{ App\Helpers\PriceHelper::DiscountPercentage($new) }}
                                    </div>
                                    @endif
                                    <div class="product-actions">
                                        <ul class="product-btn-list">
                                            <li>
                                                <a href="{{ route('product.detail', $new->slug) }}" class="product-btn"><i class="icon-eye"></i></a>
                                            </li>
                                            @if ($new->is_stock())
                                            <li>
                                                <form action="{{ route('cart-add.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="productId" value="{{ $new->id }}">
                                                    <input type="hidden" name="product_quantity" value="1">
                                                <button class="product-btn addToCart border-0"><i class="icon-basket"></i></button>
                                            </form>
                                            </li>
                                            @endif
                                            <li>
                                                <a href="{{ route('wishlist.store', $new->id) }}" class="product-btn"  title="{{__('Wishlist')}}"><i class="icon-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__body">
                                <div class="product-category">{{ App\Brand::find($new->brand_id)->name }}</div>
                                <h3 class="product-name">
                                    <a href="{{ route('product.detail', $new->slug) }}">{{ $new->name }}</a>
                                </h3>
                                <div class="product-price">
                                    @if ($new->previous_price!=null)
                                    <del class="old">
                                        <span class="amount">TK.  {{ $new->previous_price }}</span></del>
                                    @endif
                                    <ins class="current ">
                                        <span class="amount">TK.  {{ $new->discount_price }}</span>
                                    </ins>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- end product cards -->
            </div>
            <!-- end best seller products section -->
        </div>

        <!-- shop by category section -->
        <div class="item-wrapper">
            <!-- item wrapper images -->
            <!-- <div class="item-wrapper__row">
                <div class="item-wrapper-col">
                    <div class="item-wrapper__img img-hover-1">
                        <a href="#"><img src="assets/images/cat-img-03.jpg" alt=""></a>
                    </div>
                    <a href="#" class="item-wrapper__caption">women</a>
                </div>
                <div class="item-wrapper-col">
                    <div class="item-wrapper__img img-hover-1">
                        <a href="#"><img src="assets/images/cat-img-04.jpg" alt=""></a>
                    </div>
                    <a href="#" class="item-wrapper__caption">men</a>
                </div>
                <div class="item-wrapper-col">
                    <div class="item-wrapper__img img-hover-1">
                        <a href="#"><img src="assets/images/cat-img-05.jpg" alt=""></a>
                    </div>
                    <a href="#" class="item-wrapper__caption">kids</a>
                </div>
            </div> -->
            <!-- item wrapper content box -->
        </div>


        <!-- blog post section -->
        <div class="pt-150">
            <div class="container">
                <!-- main title -->
                <div class="row">
                    <div class="col-12">
                        <div class="heading">
                            <h2 class="main-heading">{{ setting()->blog_heading }}</h2>
                        </div>
                    </div>
                </div>
                <!-- end main title -->
                <!-- blog posts -->
                <div class="row">
                    @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post-card img-hover-4">
                            <div class="blog-post-image">
                                <a href="{{ route('blog.detail', $blog->slug) }}">
                                    <img src="{{ asset('assets/images/'.json_decode($blog->photo,true)[array_key_first(json_decode($blog->photo,true))]) }}" alt="{{ $blog->photo }}">
                                </a>
                            </div>
                            <div class="blog-post-body">
                                <div class="post-meta">
                                    <div class="post-author">
                                        <a href="#">By Admin</a>
                                    </div>
                                    <div class="post-date">{{ $blog->created_at->format('d M, Y') }}</div>
                                </div>
                                <a href="{{ route('blog.detail', $blog->slug) }}">
                                    <h3 class="post-title">{{ Str::limit($blog->title, 50) }}</h3>
                                </a>
                                <div class="post-summery">
                                    <p>{{ strlen(strip_tags($blog->details)) > 120 ? substr(strip_tags($blog->details), 0, 120) : strip_tags($blog->details) }}</p>
                                </div>
                                <div class="post-btn">
                                    <a href="{{ route('blog.detail', $blog->slug) }}" class="button button--link">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- blog posts -->
            </div>
        </div>
        <!-- end blog post section -->
        <!-- social media section -->
        @include('includes.instagram')
        <!-- end social media section -->
    </div>
    <!-- end main content section -->

@endsection