@extends('layouts.frontendApp')
@section('title')
    Product Detail | SHURUNG
@endsection
@section('frontendContent')
    
    <!-- breadcrumb section -->
    <div class="custom-breadcrumb custom-breadcrumb--minimal">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ App\Category::find($product->category_id)->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- main content section -->
    <div class="main-content pb-150">
        <!-- single product section -->
        <div class="container">
            <div class="product-layout-carousel">
                <div class="row">
                    <!-- product gallery section -->
                    <div class="col-lg-7">
                        <div class="product-images">
                            <div class="row gallery">
                                <!-- product gallery thumbnails section -->
                                <div class="col-md-2 product-thumbnails gallery-nav gallery-nav--vr">
                                    <div class="gallery-nav__item">
                                        <div class="image-thumb">
                                            <img src="{{ asset('assets/images') }}/{{ $product->photo }}" alt="{{ $product->photo }}">
                                        </div>
                                    </div>
                                    @foreach ($galleries as $gallery)
                                    <div class="gallery-nav__item">
                                        <div class="image-thumb">
                                            <img src="{{ asset('assets/images') }}/{{ $gallery->photo }}" alt="{{ $gallery->photo }}">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- product gallery main image section -->
                                <div class="col-md-10">
                                    <div class="product-gallery-slider gallery-main">
                                        <div class="image-item">
                                            <a href="{{ asset('assets/images') }}/{{ $product->photo }}" data-toggle="lightbox"
                                                data-gallery="product-gallery">
                                                <img src="{{ asset('assets/images') }}/{{ $product->photo }}" alt="{{ $product->photo }}"></a>
                                        </div>
                                        @foreach ($galleries as $gallery)
                                        <div class="image-item">
                                            <a href="{{ asset('assets/images') }}/{{ $gallery->photo }}" data-toggle="lightbox"
                                                data-gallery="product-gallery">
                                                <img src="{{ asset('assets/images') }}/{{ $gallery->photo }}" alt="{{ $gallery->photo }}"></a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end product gallery section -->
                    <!-- product summery section -->
                    <div class="col-lg-5">
                        <div class="product-wrapper product-wrapper--sticky">
                            <form  action="{{ route('cart-add.store')  }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="productId">
                                <div class="product-header">
                                    <div class="review-rate">
                                        @if (average_stars($product->id) != 0)
                                        <div class="rate-stars">
                                            <span class="rate-{{ average_stars($product->id) }}"></span>
                                        </div>
                                        @endif
                                        <div class="rate-number">
                                            ({{ average_stars($product->id) }})
                                        </div>
                                    </div>
                                    <div class="product-category">
                                        {{ App\Brand::find($product->brand_id)->name }}
                                    </div>
                                    <h2 class="product-title"></h2>
                                </div>
                                <div class="product-price">
                                    @if ($product->previous_price != null)
                                    <del class="old">
                                        <span class="amount">TK. {{ $product->previous_price  }}</span></del>
                                    @endif
                                    <ins class="current">
                                        <span class="amount">TK. {{ $product->discount_price }}</span></ins>
                                </div>
                                <p>
                                    {{ $product->sort_details }}
                                </p>
                                <div class="product-add-to-cart">
                                    {{-- <form action="{{ route('cart-add.store')  }}" method="POST"> --}}
                                        @csrf
                                        <div class="product-quantity">
                                            <div class="quantity-input">
                                                <span class="quantity__minus"><i class="fas fa-minus"></i></span>
                                                <input class="quantity__input" type="text" value="1" name="product_quantity" />
                                                <span class="quantity__plus"><i class="fas fa-plus"></i></span>
                                            </div>
                                        </div>
                                        
                                        @if ($product->is_stock())
                                        <button type="submit" name="add-to-cart"
                                            class="add-to-header-cart button button--dark button-md">Add to cart
                                        </button>
                                        @endif
                                    {{-- </form> --}}
                                </div>
                            </form>
                            <div class="product-wishlist">
                                <a href="{{ route('wishlist.store', $product->id) }}" class="button button--light button-md">Wishlist
                                    <i class="icon-heart"></i> </a>
                            </div>
                        </div>
                    </div>
                    <!-- end product summery section -->
                </div>
            </div>
            <!-- product information section -->
            <div class="row">
                <div class="col-12">
                    <div class="product-info pt-150">
                        <ul class="nav nav-pills product-info__nav nav--minimal" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-description-tab" data-toggle="pill"
                                    href="#pills-description" role="tab" aria-controls="pills-description"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-size-tab" data-toggle="pill" href="#pills-size" role="tab"
                                    aria-controls="pills-size" aria-selected="false">Size Guid</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review"
                                    role="tab" aria-controls="pills-review" aria-selected="false">Review</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- product information description -->
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                                aria-labelledby="pills-description-tab">
                                <div class="product-des">
                                    {{ $product->details }}
                                </div>
                            </div>
                            <!-- product information size guid -->
                            <div class="tab-pane fade" id="pills-size" role="tabpanel" aria-labelledby="pills-size-tab">
                                <!-- size cart clothes -->
                                <div class="size-guid-table">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="dynamic-size-table" data-unit="CM">
                                                <div class="table-caption">
                                                    <div class="table-title">Clothing</div>
                                                </div>
                                                <table class="table table--bordered">
                                                    <thead class="table__head">
                                                        <tr>
                                                            <th scope="col">Specification Name</th>
                                                            <th scope="col">Specification Description</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table__body">
                                                    @if($sec_name)
                                                    @foreach(array_combine($sec_name,$sec_details) as  $sname => $sdetail)
                                                    <tr>
                                                        <td>{{$sname}}</td>
                                                        <td>{{$sdetail}}</td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr class="text-center">
                                                        <td colspan="2">{{__('No Specifications')}}</td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product information reviews -->
                            <div class="tab-pane fade" id="pills-review" role="tabpanel"
                                aria-labelledby="pills-review-tab">
                                <div class="product-review-form">
                                    
                            @if ($show_review_form == 1 )
                                <form action="{{ route('review.post') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $order_detail_id }}" name="order_detail_id">
                                    <div class="form-row">
                                        <div class="col-lg-9 col-md-7 col-sm-7">
                                            <div class="rating-wrapper">
                                                <span>Your rating</span>
                                                <ul class="inline-list">
                                                    <li><input style="display: none;" id="star1" type="radio" name="stars" value="1" /><label style="cursor: pointer;" for="star1" class="icon-star"></label></li>
                                                    <li><input style="display: none;" id="star2" type="radio" name="stars" value="2" /><label style="cursor: pointer;" for="star2" class="icon-star"></label></li>
                                                    <li><input style="display: none;" id="star3" type="radio" name="stars" value="3" /><label style="cursor: pointer;" for="star3" class="icon-star"></label></li>
                                                    <li><input style="display: none;" id="star4" type="radio" name="stars" value="4" /><label style="cursor: pointer;" for="star4" class="icon-star"></label></li>
                                                    <li><input style="display: none;" id="star5" type="radio" name="stars" value="5" checked /><label style="cursor: pointer;" for="star5" class="icon-star"></label></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <textarea class="form-control" id="textarea" rows="4"
                                                placeholder="Review" name="review"></textarea>
                                        </div>
                                        <div class="col-lg-9 col-md-7 col-sm-7"></div>
                                        <div class="col-lg-3 col-md-5 col-sm-5">
                                            <button type="submit" class="button button--dark review-form_btn">
                                                Send
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            
                            @endif
                                </div>
                                <div class="comments-list">
                                    <ul class="media-list">
                                        @foreach ($reviews as $review)
                                        <li class="media-item">
                                            <div class="media-item__body">
                                                <div class="user-avatar">
                                                    <img src="{{  asset('uploads/profile') }}/{{ review_user_name($review->user_id) }}" alt="">
                                                </div>
                                                <div class="media-inner">
                                                    <div class="header">
                                                        <div class="review-rate">
                                                            <div class="rate-stars">
                                                                <span class="rate-{{ $review->stars }} "></span>
                                                            </div>
                                                        </div>
                                                        <div class="user-name">
                                                            {{-- <h6>{{ $single_user($review-) }}</h6> --}}
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <p>{{ $review->review }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end product information section -->
            <!-- related product section -->
            <div class="related-products-area pt-150">
                <!-- main title -->
                <div class="row">
                    <div class="col-12">
                        <div class="heading">
                            <h2 class="main-heading">{{ setting()->product_detail_related_heading }}</h2>
                        </div>
                    </div>
                </div>
                <!-- end main title -->
                <!-- products cards -->
                <div class="row">
                    @forelse ($related_products as $related)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-card product-card--block">
                            <div class="product-card__img">
                                <a href="{{ route('product.detail', $related->slug) }}">
                                    <img src="{{ asset('assets/images') }}/{{ $related->photo }}" alt="{{ $related->photo }}">
                                </a>
                                <div class="product-card__overlay">
                                    @if ($related->previous_price != null)
                                    <div class="product-badge">
                                        -{{ App\Helpers\PriceHelper::DiscountPercentage($related) }}
                                    </div>
                                    @endif
                                    <div class="product-actions">
                                        <ul class="product-btn-list">
                                            <li>
                                                <a href="{{ route('product.detail', $related->slug) }}" class="product-btn"><i class="icon-eye"></i></a>
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
                                <div class="product-category">{{ App\Category::find($related->category_id)->name }}</div>
                                <h3 class="product-name">
                                    <a href="{{ route('product.detail', $related->slug) }}">{{ $related->name }}</a>
                                </h3>
                                <div class="product-price">
                                    @if ($related->previous_price!=null)
                                    <del class="old">
                                        <span class="amount">TK.  {{ $related->previous_price }}</span></del>
                                    @endif
                                    <ins class="current">
                                        <span class="amount">TK.   {{ $related->discount_price }}</span></ins>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p>No related product</p>
                    @endforelse
                </div>
                <!-- end products cards -->
            </div>
            <!-- end related product section -->
        </div>
        <!-- end single product section -->
    </div>
    <!-- end main content section -->
@endsection