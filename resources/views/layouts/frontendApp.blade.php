
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images') }}/{{ setting()->favicon }}"/>
    <!-- Core Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontendAsset') }}/assets/css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('frontendAsset') }}/assets/css/fontawesome.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="{{ asset('frontendAsset') }}/assets/css/animate.css">
    <!-- Slick slider -->
    <link rel="stylesheet" href="{{ asset('frontendAsset') }}/assets/css/slick.css">
    <!-- Range slider -->
    <link rel="stylesheet" href="{{ asset('frontendAsset') }}/assets/css/ion.rangeSlider.min.css">
    <!-- light box -->
    <link rel="stylesheet" href="{{ asset('frontendAsset') }}/assets/css/lightbox.min.css">
    <!-- nice select -->
    <link rel="stylesheet" href="{{ asset('frontendAsset') }}/assets/css/nice-select.min.css">
    <!-- main custom styles -->
    <link rel="stylesheet" href="{{ asset('frontendAsset') }}/assets/scss/main.css">
    <link rel="stylesheet" href="{{ asset('frontendAsset') }}/assets/css/changes.css">
    <link rel="stylesheet" href="{{ asset('frontendAsset') }}/assets/css/custom.css">
</head>

<body>
    <!-- header section -->
    <div class="header">
        <!-- top header section -->
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 top-header__left">
                        <div class="top-header-inner">
                            <div class="widget widget_info">
                                <span class="info-icon"><i class="icon-location"></i></span>
                                <a class="info-text" href="https://goo.gl/maps/vg5FbwXwHqwifEK6A" target="_blank">{{ setting()->address }}</a>
                            </div>
                            <div class="widget widget_info">
                                <span class="info-icon"><i class="icon-phone"></i></span>
                                <a class="info-text" href="tel:{{ setting()->phone }}">{{ setting()->phone }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 top-header__right">
                        <div class="top-header-inner">
                            <div class="widget widget_info">
                                <span class="info-icon"><i class="icon-clock"></i></span>
                                <span class="info-text">{{ setting()->office_time_day }}: {{ setting()->office_time_hour }}</span>
                            </div>
                            <div class="widget widget_social-media">
                                @php
                                    $links = json_decode(setting()->social_link,true)['links'];
                                    $icons = json_decode(setting()->social_link,true)['icons'];
                                @endphp
                                <ul class="widget-list">
                                    
                                    @foreach ($links as $link_key => $link)
                                        <li class="widget-list_item">
                                            <a target="_blank" href="{{$link}}"><i class="{{$icons[$link_key]}}"></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end top header section -->
        <!-- main header section -->
        <div class="main-header">
            <nav class="navbar navbar-expand-lg main-navbar main-navbar--light">
                <div class="container">
                    <!-- header logo image -->
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img class="logo" src="{{ setting()->nav_logo ? asset('assets/images/'.setting()->nav_logo) : asset('assets/images/placeholder.png') }}" alt="Logo not found">
                    </a>
                    <!-- header logo image -->
                    <!-- header action buttons -->
                    <div class="header__btn">
                        <!-- header search box -->
                        <div class="header-search">
                            <a role="button" class="header-search__btn">
                                <i class="icon-search"></i>
                            </a>
                            <div class="header-search__box" id="the-basics">
								<form action="{{ route('search') }}" method="GET">
									<div class="search-input">
										<input type="text" class="form-control typeahead" id="search"
											value="" placeholder="Search..." name="filter[name]" required>
											<button type="submit" value="Search"> <i class="fas fa-search"></i> </button>
									</div>
								</form>
                            </div>
                        </div>
                        <!-- end of header search box -->
                        <!-- header cart btn dropdown -->
                        @if (Auth::check())
                        <a href="#" class="header__btn-dropdown" data-target="wishBtn">
                            <i class="icon-heart"></i>
                            <span class="btn-badge wishlist_count">{{Auth::user()->wishlists->count()}}</span>
                        </a>
                        @else
                        <a href="#" class="header__btn-dropdown" data-target="wishBtn">
                            <i class="icon-heart"></i>
                        </a>
                        @endif
                        <a href="#" class="header__btn-dropdown" data-target="cartBtn">
                            <i class="icon-basket"></i>
                            <span class="btn-badge cart_count">{{ cart_count() }}</span>
                        </a>
                        <!-- end header cart btn dropdown -->
                        <!-- header login btn dropdown -->
                        <a href="#" class="header__btn-dropdown" data-target="userBtn">
                            <i class="icon-user"></i>
                        </a>
                        <!-- end header login btn dropdown -->
                        <!-- dropdown buttons inner content -->
                        <div id="actionsDropdown">
                            <!-- dropdown cart -->
                            
                            <div class="dropdown-wrapper" id="wishBtn" data-collapse="false">
                                <!-- cart items list -->
                                <div class="cart-list">
                                    <ul class="list-no-style">
                                        @foreach (wish_items() as $wish_item)
                                        <li class="cart-list__item">
                                            <div class="media">
                                                <a href="{{ route('product.detail', $wish_item->thisproduct->slug) }}" class="product-img">
                                                    <img src="{{ asset('assets/images') }}/{{ $wish_item->thisproduct->photo }}" alt="No photo found">
                                                </a>
                                                <div class="media-body">
                                                    <a href="{{ route('product.detail', $wish_item->thisproduct->slug) }}" class="product-name">{{ $wish_item->thisproduct->name }}</a>
                                                    <div class="product-price">
                                                        <ins class="current ">
                                                            <span class="amount">TK. {{ $wish_item->thisproduct->discount_price }}</span></ins>
                                                            <br>
                                                    </div>
                                                    <a href="{{ route('wishlist.delete', $wish_item->id) }}" class="delete-icon"><i class="fas fa-times"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    {{-- <div class="dropdown-wrapper-divider"></div>
                                    <div class="dropdown-wrapper-footer">
                                        <div class="total-price">
                                            <span>Subtotal</span>
                                            <span class="price">৳{{ $Subtotal }}</span>
                                        </div>
                                        <div class="footer-btn">
                                            <a href="{{ route('cart') }}" class="button button--dark-outline">Cart</a>
                                            <a href="{{ route('checkout') }}" class="button button--dark">Check out</a>
                                        </div>
                                    </div> --}}
                                </div>
                                <!-- end cart items list -->
                                <!-- the cart is empty -->
                                <div class="empty-cart">
                                    <a href="{{ route('wishlist') }}" class="button button&#45;&#45;dark button-sm">Wishlist</a>
                                </div>
                            </div>
                            <div class="dropdown-wrapper" id="cartBtn" data-collapse="false">
                                <!-- cart items list -->
                                <div class="cart-list">
                                    <ul class="list-no-style">
                                        
                                        @php
                                           $Subtotal = 0;
                                        @endphp
                                        @foreach (cart_items() as $cart_item)
                                        <li class="cart-list__item">
                                            <div class="media">
                                                <a href="{{ route('product.detail', $cart_item->product->slug) }}" class="product-img">
                                                    <img src="{{asset('assets/images/'.$cart_item->product->photo)}}" alt="No photo found">
                                                </a>
                                                <div class="media-body">
                                                    <a href="#" class="product-name">{{ $cart_item->product->name }}</a>
                                                    <div class="product-price">
                                                        @if ($cart_item->product->previous_price != null)
                                                        <del class="old">
                                                            <span class="amount">TK. {{  $cart_item->product->previous_price }}</span></del>
                                                        @endif
                                                        <ins class="current ">
                                                            <span class="amount"> {{ $cart_item->product_quantity }} X ৳{{  $cart_item->product->discount_price   }}</span></ins>
                                                            <br>
                                                        <ins class="current ">
                                                            <span class="amount">=TK. {{  $cart_item->product_quantity * ($cart_item->product->discount_price)   }}</span></ins>
                                                    </div>
                                                    <a href="{{ route('cart-add.delete', $cart_item->id) }}" class="delete-icon"><i class="fas fa-times"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        
											@php
                                                $Subtotal += ($cart_item->product->discount_price * $cart_item->product_quantity);
                                            @endphp
                                        @endforeach
                                    </ul>
                                    <div class="dropdown-wrapper-divider"></div>
                                    <div class="dropdown-wrapper-footer">
                                        {{-- <div class="total-price">
                                            <span>Subtotal</span>
                                            <span class="price">৳{{ $Subtotal }}</span>
                                        </div> --}}
                                        <div class="footer-btn">
                                            <a href="{{ route('cart') }}" class="button button--dark-outline">Cart</a>
                                            <a href="{{ route('checkout') }}" class="button button--dark">Check out</a>
                                        </div>
                                        
                                        @php
                                            session(['cart_subtitle' => $Subtotal]);
                                        @endphp
                                    </div>
                                </div>
                                <!-- end cart items list -->
                                <!-- the cart is empty -->
                                <!--                                                        <div class="empty-cart">-->
                                <!--                                                            <p class="text">No products in the cart</p>-->
                                <!--                                                            <a href="shop-sidebar.html" class="button button&#45;&#45;dark button-sm">Shop Now</a>-->
                                <!--                                                        </div>-->
                            </div>
                            <!-- dropdown user -->
                            <div class="dropdown-wrapper" id="userBtn" data-collapse="false">
                                <!--when user is log in -->
                                @if (Auth::check())   
                                <div class="user-account-wrapper">
                                    <div class="user-info">
                                        <div class="user-avatar">
                                            <img style="border-radius: 50%;" src="{{ asset('uploads/profile') }}/{{ Auth::user()->photo }}" alt="{{ Auth::user()->photo }}">
                                        </div>
                                        <div class="user-data">
                                            <a href="#" class="user-name">{{ Auth::user()->name }}</a>
                                            <span class="user-meta">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                    <div class="dropdown-wrapper-divider"></div>
                                    <div class="dropdown-wrapper-footer">
                                        <ul class="list-no-style">
                                            <li><a href="{{ route('user.account') }}">My account</a></li>
                                            <li><a href="{{ route('user.order') }}">My orders</a></li>
                                            {{-- <li><a href="{{ route('passwo') }}">Change password</a></li> --}}
                                            <li>
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button  type="submit" class="dropdown-item" style="padding: 0">
                                                        {{-- <i class="mr-1 flaticon-power-button"></i> <span>Log Out</span> --}}
                                                        Log Out
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @endif
                                <!-- when user is logged in -->
                                <!-- when user is logged out -->
                                @if (!Auth::check())
                                <form class="dropdown-register_form"  method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="dropdown-register_link">
                                        <span>Didn't register yet?</span>
                                        <a href="{{ route('user.register') }}">Register</a></div>
                                    <h2 class="title">Log in to your account</h2>
                                    <div class="custom-form">
                                        <div class="input-wrapper form-group">
                                            <input type="text" class="form-control" id="emailInput"
                                                   placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            <label class="form-control-label">Email Address</label>
                                        </div>
                                        <div class="input-wrapper form-group">
                                            <div class="password-box">
                                                <input type="password" class="form-control" id="PassInput" placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                <label class="form-control-label">Password</label>
                                                <div class="password-box-icon">
                                                <span class="showhidepassword"><i
                                                        class="far fa-eye-slash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="form-row custom-form_helper">
                                            <div class="col-12">
                                                <div class="forget-pass-link">
                                                    <a href="forget-pass.html">Forgot your password?</a>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="custom-form_btn">
                                            <button type="submit" class="button button&#45;&#45;dark button-block">Sign in</button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                                <!-- when user is logged out -->
                            </div>
                        </div>
                        <!-- end dropdown buttons inner content -->
                    </div>
                    <!-- navbar collapse button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- end navbar collapse button -->
                    <!-- navbar list items -->
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav main-menu" id="mainMenu">
                            <!-- simple dropdown with footer -->
                            <li class="nav-item menu-item active">
                                <a class="nav-link menu-item_link" href="{{ route('index') }}">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item menu-item">
                                <a class="nav-link menu-item_link" href="{{ route('new.arraivals') }}">
                                    New Arrivals
                                </a>
                            </li>
                            <!-- dropdown with sub dropdown -->
                            <li class="nav-item menu-item dropdown">
                                <a class="nav-link menu-item_link dropdown-toggle" href="#" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Store
                                </a>
                                
                                @php
                                $categories = App\Category::with('subcategory')->whereStatus(1)->orderby('serial','asc')->take(8)->get();
                                @endphp
                                <div class="dropdown-menu dropdown-list dropdown-list--br dropdown-list--md">
                                    <div class="dropdown_inner">
                                        <ul class="list-no-style">
                                            @foreach ($categories as $key => $catego)
                                            <li class="dropdown {{ $catego->subcategory->count() > 0 ? " sub-menu-dropdown" : ''}} ">
                                                <a class="dropdown-item  {{ $catego->subcategory->count() > 0 ? "dropdown-toggle" : ''}} " href="{{ route('single.category', $catego->slug) }}"
                                                    >{{ $catego->name }}
                                                </a>
                                                <ul
                                                    class="dropdown-menu dropdown-list {{ $catego->subcategory->count() > 0 ? " dropdown-list--br" : ''}}  sub-menu-dropdown_right">
                                                    @foreach ($catego->subcategory as $scategory)
                                                    <li><a class="dropdown-item" href="{{ route('single.subcategory', $scategory->slug) }}">{{ $scategory->name }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- dropdown with sub dropdown -->
                            <!-- simple link -->
                            <li class="nav-item menu-item">
                                <a class="nav-link menu-item_link" href="{{ route('blog') }}">
                                    Blog
                                </a>
                            </li>
                            <li class="nav-item menu-item">
                                <a class="nav-link menu-item_link" href="{{ route('about') }}">
                                    About us
                                </a>
                            </li>
                            <li class="nav-item menu-item">
                                <a class="nav-link menu-item_link" href="{{ route('contact') }}">
                                    Contact us
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end navbar list items -->
                </div>
            </nav>
        </div>
        <!-- end main header section -->
    </div>
    <!-- end header section -->
    @yield('frontendContent')

        <!-- footer section -->
        <footer>
            <div class="footer">
                <div class="footer-top-row">
                    <div class="container">
                        <div class="row">
                            <!-- footer logo section -->
                            <div class="col-lg-3 col-md-12 footer-col">
                                <div class="widget widget_logo">
                                    <img src="{{ setting()->footer_logo ? asset('assets/images/'.setting()->footer_logo) : asset('assets/images/placeholder.png') }}" alt="Footer logo not found">
                                </div>
                            </div>
                            <!-- footer contact information section -->
                            <div class="col-lg-3 col-md-4 footer-col">
                                <div class="widget widget_contact">
                                    <div class="info-wrapper">
                                        <span class="icon"><i class="icon-location"></i></span>
                                        <div class="content">
                                            <h6>Address:</h6>
                                            <p>{{ setting()->address }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 footer-col">
                                <div class="widget widget_contact">
                                    <div class="info-wrapper">
                                        <span class="icon"><i class="icon-phone"></i></span>
                                        <div class="content">
                                            <h6>Phone:</h6>
                                            <a style="color: inherit;" href="tel:{{ setting()->phone }}">{{ setting()->phone }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 footer-col">
                                <div class="widget widget_contact">
                                    <div class="info-wrapper">
                                        <span class="icon"><i class="icon-envelope"></i></span>
                                        <div class="content">
                                            <h6>Email:</h6>
                                            <a href="mailto:{{ setting()->email }}" style="color: inherit;">{{ setting()->email }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-main-content">
                    <div class="container">
                        <div class="row">
                            <!-- footer about section -->
                            <div class="col-lg-3 col-md-6 footer-col">
                                <div class="widget widget_about">
                                    <h3 class="widget-title">{{ setting()->footer_about_heading }}</h3>
                                    <div class="widget-desc">
                                        <p>{{ setting()->footer_about_description }}</p>
                                    </div>
                                </div>
                                <div class="widget widget_social-media">
                                    <ul class="widget-list">
                                        @foreach ($links as $link_key => $link)
                                            <li class="widget-list_item">
                                                <a target="_blank" href="{{$link}}"><i class="{{$icons[$link_key]}}"></i></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- footer shop links section -->
                            <div class="col-lg-3 col-md-6 footer-col">
                                <div class="widget widget_shop-links">
                                    <h3 class="widget-title">Store</h3>
                                    <ul class="widget-list">
                                        @foreach ($categories as $key => $catego)
                                        <li class="widget-list_item">
                                            <a href="{{ route('single.category', $catego->slug) }}">{{ $catego->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- footer company short links section -->
                            <div class="col-lg-3 col-md-6 footer-col">
                                <div class="widget widget_short-links">
                                    <h3 class="widget-title">Company</h3>
                                    <ul class="widget-list">
                                        <li class="widget-list_item">
                                            <a href="{{ route('about') }}">Our story</a>
                                        </li>
                                        <li class="widget-list_item">
                                            <a href="{{ route('new.arraivals') }}">Shop</a>
                                        </li>
                                        <li class="widget-list_item">
                                            <a href="{{ route('terms.conditions') }}">Terms of use</a>
                                        </li>
                                        <li class="widget-list_item">
                                            <a href="{{ route('privecy.policy') }}">Privacy policy</a>
                                        </li>
                                        <li class="widget-list_item">
                                            <a href="{{ route('return.refund') }}">Return Refund</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- footer help links section -->
                            <div class="col-lg-3 col-md-6 footer-col">
                                <div class="widget widget_help">
                                    <h3 class="widget-title">My Account</h3>
                                    <ul class="widget-list">
                                        
									@if (Auth::user())
                                    <li class="widget-list_item">
                                        <a href="{{ route('user.account') }}">My Account</a>
                                    </li>
                                    <li class="widget-list_item">
                                        <a href="{{ route('user.account.update') }}">Update Profile</a>
                                    </li>
                                    <li class="widget-list_item">
                                        <a href="{{ route('user.order') }}">Order</a>
                                    </li>
                                    <li class="widget-list_item">
                                        <a href="{{ route('cart') }}">Cart</a>
                                    </li>
                                    <li class="widget-list_item">
                                        <a href="{{ route('wishlist') }}">Wishlist</a>
                                    </li>
                                    <li class="widget-list_item">
										<form action="{{ route('logout') }}" method="POST">
											@csrf
											<button style="background: none; border: 0; color: #aeaeae; font-size: 14px;" type="submit">Logout</button>
										</form>
                                    </li>
									@else
										<li class="widget-list_item">
											<a href="{{ route('login') }}">Login</a>
										</li>
										<li class="widget-list_item">
											<a href="{{ route('register') }}">Register</a>
										</li>
										<li class="widget-list_item">
											<a href="{{ route('cart') }}">Cart</a>
										</li>
										<li class="widget-list_item">
											<a href="{{ route('wishlist') }}">Wishlist</a>
										</li>
									@endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom-row">
                    <div class="container">
                        <div class="footer-divider"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="widget widget_copyright">
                                    <p>{{ setting()->copyright }} | Design and Developed by <a target="_blank"
                                            href="https://futureinltd.com/"  target="_blank">Future Innovation
                                            LTD</a> </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget widget_payment">
                                    <img src="{{ asset('assets/images') }}/{{ setting()->payment_getway_image }}" alt="{{ setting()->payment_getway_image }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer section -->
        <!-- back to top btn -->
        <a class="back-to-top-btn" id="backToTop"></a>
        <!-- end back to top btn -->
        <!-- Theme js files -->
        <script src="{{ asset('frontendAsset') }}/assets/js/jquery.min.js"></script>
        <script src="{{ asset('frontendAsset') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('frontendAsset') }}/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ asset('frontendAsset/assets/js/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <!-- slick js -->
        <script src="{{ asset('frontendAsset') }}/assets/js/slick.min.js"></script>
        <!-- range slider js -->
        <script src="{{ asset('frontendAsset') }}/assets/js/ion.rangeSlider.min.js"></script>
        <!-- nice select -->
        <script src="{{ asset('frontendAsset') }}/assets/js/nice-select.min.js"></script>
        <!-- countdown -->
        <script src="{{ asset('frontendAsset') }}/assets/js/countdown.jquery.min.js"></script>
        <!-- light box -->
        <script src="{{ asset('frontendAsset') }}/assets/js/lightbox.min.js"></script>
        @yield('footer_script')
        <!-- theme js -->
        <script src="{{ asset('frontendAsset') }}/assets/js/myScript.js"></script>
        <script src="{{ asset('frontendAsset') }}/assets/js/custom.js"></script>
        <script src="{{ asset('frontendAsset') }}/assets/js/development.js"></script>


        
<script type="text/javascript">
    let mainurl = '{{route('index')}}';

    let view_extra_index = 0;
      // Notifications
      function SuccessNotification(title){
            $.notify({
                title: ` <strong>${title}</strong>`,
                message: '',
                icon: 'fas fa-check-circle'
                },{
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class'
            });
        }

        function DangerNotification(title){
            $.notify({
                // options
                title: ` <strong>${title}</strong>`,
                message: '',
                icon: 'fas fa-exclamation-triangle'
                },{
                // settings
                element: 'body',
                position: null,
                type: "danger",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class'
            });
        }
        // Notifications Ends
    </script>

    @if(Session::has('error'))
    <script>
      $(document).ready(function(){
        DangerNotification('{{Session::get('error')}}')
      })

    </script>
    @endif
    @if(Session::has('success'))
    <script>
      $(document).ready(function(){
        SuccessNotification('{{Session::get('success')}}');
      })

    </script>
    @endif


    <script>
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };
    
            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>
    </body>
    </html>
