
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images') }}/{{ setting()->favicon }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('dashboardAsset') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboardAsset') }}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL {{ asset('dashboardAsset') }}/plugins/CUSTOM STYLES -->
    <link href="{{ asset('dashboardAsset') }}/assets/css/support-chat.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboardAsset') }}/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboardAsset') }}/plugins/charts/chartist/chartist.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboardAsset') }}/assets/css/default-dashboard/style.css" rel="stylesheet" type="text/css" />    
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAsset') }}/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" href="{{ asset('dashboardAsset') }}/assets/css/bootstrap-iconpicker.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAsset') }}/assets/css/ecommerce/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAsset') }}/assets/css/tagify.css">
    @yield('addetional_css')
    <!-- END PAGE LEVEL/plugins/CUSTOM STYLES -->   


</head>
<body class="default-sidebar">

    <!-- Tab Mobile View Header -->
    <header class="tabMobileView header navbar fixed-top d-lg-none">
        <div class="nav-toggle">
                <a href="javascript:void(0);" class="nav-link sidebarCollapse" data-placement="bottom">
                    <i class="flaticon-menu-line-2"></i>
                </a>
            <a href="{{ route('home') }}"> {{ env('APP_NAME') }} </a>
        </div>
        <ul class="nav navbar-nav">
            <li class="nav-item d-lg-none"> 
                <form class="form-inline justify-content-end" role="search">
                    <input type="text" class="form-control search-form-control mr-3">
                </form>
            </li>
        </ul>
    </header>
    <!-- Tab Mobile View Header -->

    <!--  BEGIN NAVBAR  -->
    <header class="header navbar fixed-top navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse d-none d-lg-block" data-placement="bottom"><i class="flaticon-menu-line-2"></i></a>
        <ul class="navbar-nav flex-row mr-lg-auto ml-lg-0  ml-auto">
            <li class="nav-item dropdown message-dropdown ml-lg-4">
                {{-- <a href="{{ route('message.index') }}" class="nav-link">
                    <span class="flaticon-mail-10"></span><span class="badge badge-primary">{{ newMessage() }}</span>
                </a> --}}
            </li>
            <li class="nav-item dropdown message-dropdown ml-lg-4">
                {{-- <a href="{{ route('order.index') }}" class="nav-link">
                    <span class="flaticon-cart-2"></span><span class="badge badge-primary">{{ newOrder() }}</span>
                </a> --}}
            </li>
        </ul>


        <ul class="navbar-nav flex-row ml-lg-auto">
            <li class="nav-item dropdown user-profile-dropdown ml-lg-0 mr-lg-2 ml-3 order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span> <img  style="width: 30px; height: 30px; border-radius: 50%;" src="{{ asset('uploads/profile') }}/{{ Auth::user()->photo }}" alt=""> </span>
                </a>
                <div class="dropdown-menu  position-absolute" aria-labelledby="userProfileDropdown">
                    <a class="dropdown-item" href="{{ route('register') }}">
                        <i class="mr-1 flaticon-user-6"></i> <span>Add Admin</span>
                    </a>
                    <a class="dropdown-item" href="{{ route('update.profile') }}">
                        <i class="flaticon-gear-2"></i> <span>Update Profile</span>
                    </a>
                    {{-- <a class="dropdown-item" href="{{ route('update.admin.profile', Auth::id()) }}">
                        <i class="mr-1 flaticon-user-6"></i> <span>My Profile</span>
                    </a> --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="mr-1 flaticon-power-button"></i> <span>Log Out</span>
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </header>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>

        <!--  BEGIN SIDEBAR  -->

        <div class="sidebar-wrapper sidebar-theme">
            
            <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>
            
            <nav id="sidebar">

                <ul class="navbar-nav theme-brand flex-row  d-none d-lg-flex">
                    
                    <li class="nav-item theme-text">
                        <a href="{{ route('home') }}" class="nav-link"> {{ env('APP_NAME') }} </a>
                    </li>
                </ul>


                <ul class="list-unstyled menu-categories" id="accordionExample">
                    
                    <li class="menu active">
                        <a href="{{ route('home') }}" class="dropdown-toggle active">
                            <div class="">
                                <i class="flaticon-computer-6 ml-3"></i>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="#catetgory" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-pie-line-chart"></i>
                                <span>Manage Category</span>
                            </div>
                            <div>
                                <i class="flaticon-right-arrow"></i>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="catetgory" data-parent="#accordionExample">
                            <li>
                                <a href="{{ route('category.index') }}">Category</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.subcategory.index') }}">Subcategory</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="menu">
                        <a href="#ecommerce" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-cart-fill"></i>
                                <span>Manage Product</span>
                            </div>
                            <div>
                                <i class="flaticon-right-arrow"></i>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="ecommerce" data-parent="#accordionExample">
                            <li>
                                <a href="{{ route('brand.index') }}">Brand</a>
                            </li>
                            <li>
                                <a href="{{ route('product.index') }}">Product</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('brand.brands') }}"> Brands </a>
                            </li> --}}
                        </ul>
                    </li>
                    <li class="menu active">
                        <a href="{{ route('order.index') }}" class="dropdown-toggle active">
                            <div class="">
                                <i class="flaticon-cart-bag-1"></i>
                                <span>Order</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu active">
                        <a href="{{ route('setting.index') }}" class="dropdown-toggle active">
                            <div class="">
                                <i class="flaticon-setting-line"></i>
                                <span>Manage Site</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu active">
                        <a href="{{ route('banner.index') }}" class="dropdown-toggle active">
                            <div class="">
                                <i class="flaticon-crop-1"></i>
                                <span>Banner</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu active">
                        <a href="{{ route('slider.index') }}" class="dropdown-toggle active">
                            <div class="">
                                <i class="flaticon-display-1"></i>
                                <span>Display Slider</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu active">
                        <a href="{{ route('latest.index') }}" class="dropdown-toggle active">
                            <div class="">
                                <i class="flaticon-more-dot-line"></i>
                                <span>Year Latest</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu active">
                        <a href="{{ route('instagram.index') }}" class="dropdown-toggle active">
                            <div class="">
                                <i class="flaticon-instagram-social-outlined-logo"></i>
                                <span>Instagram</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu active">
                        <a href="{{ route('team.index') }}" class="dropdown-toggle active">
                            <div class="">
                                <i class="flaticon-users"></i>
                                <span>Team</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="#ecommerce2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-crm-screen-line"></i>
                                <span>Manage Blogs</span>
                            </div>
                            <div>
                                <i class="flaticon-right-arrow"></i>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="ecommerce2" data-parent="#accordionExample">
                            <li>
                                <a href="{{ route('bcategory.index') }}">Category</a>
                            </li>
                            <li>
                                <a href="{{ route('blog.index') }}">Blog</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('brand.brands') }}"> Brands </a>
                            </li> --}}
                        </ul>
                    </li>
                    <li class="menu active">
                        <a href="{{ route('contact.message') }}" class="dropdown-toggle active">
                            <div class="">
                                <i class="flaticon-double-chat"></i>
                                <span>Contact Message</span>
                            </div>
                        </a>
                    </li>
                    {{-- <li class="menu active">
                        <a href="{{ route('update.logo.banner') }}" class="dropdown-toggle active">
                            <div class="">
                                <i class="flaticon-map-1"></i>
                                <span>Logo & Collection Banner</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu active">
                        <a href="{{ route('update.term.condition') }}" class="dropdown-toggle active">
                            <div class="">
                                <i class="flaticon-map-1"></i>
                                <span>Company Policy</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu active">
                        <a href="{{ route('update.signin.signup.banner') }}" class="dropdown-toggle active">
                            <div class="">
                                <i class="flaticon-map-1"></i>
                                <span>Signin & Signup Banner</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="#ecommerce" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-cart-2"></i>
                                <span>Category</span>
                            </div>
                            <div>
                                <i class="flaticon-right-arrow"></i>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="ecommerce" data-parent="#accordionExample">
                            <li>
                                <a href="{{ route('category.categories') }}"> Add Category</a>
                            </li>
                            <li>
                                <a href="{{ route('type.types') }}"> Types </a>
                            </li>
                            <li>
                                <a href="{{ route('brand.brands') }}"> Brands </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu active">
                        <a href="{{ route('product.products') }}" class="dropdown-toggle active">
                            <div class="">
                                <i class="flaticon-map-1"></i>
                                <span>Product</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu @yield('banner')">
                        <a href="{{ route('banner.index') }}" class="dropdown-toggle  @yield('banner')">
                            <div class="active">
                                <i class="flaticon-map-1"></i>
                                <span>Home Banner</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu @yield('insta')">
                        <a href="{{ route('instagram.index') }}" class="dropdown-toggle  @yield('insta')">
                            <div class="active">
                                <i class="flaticon-map-1"></i>
                                <span>Instagram Product</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu @yield('blog')">
                        <a href="{{ route('blog.index') }}" class="dropdown-toggle  @yield('blog')">
                            <div class="active">
                                <i class="flaticon-map-1"></i>
                                <span>Blog</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu @yield('about')">
                        <a href="{{ route('store.index') }}" class="dropdown-toggle  @yield('address')">
                            <div class="active">
                                <i class="flaticon-map-1"></i>
                                <span>About</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu @yield('best_product')">
                        <a href="{{ route('best.index') }}" class="dropdown-toggle  @yield('best_product')">
                            <div class="active">
                                <i class="flaticon-map-1"></i>
                                <span>Best Product</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu @yield('social')">
                        <a href="{{ route('social.index') }}" class="dropdown-toggle  @yield('social')">
                            <div class="active">
                                <i class="flaticon-map-1"></i>
                                <span>Social media</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu @yield('address')">
                        <a href="{{ route('address.index') }}" class="dropdown-toggle  @yield('address')">
                            <div class="active">
                                <i class="flaticon-map-1"></i>
                                <span>Address</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu @yield('contact')">
                        <a href="{{ route('message.index') }}" class="dropdown-toggle  @yield('address')">
                            <div class="active">
                                <i class="flaticon-map-1"></i>
                                <span>contact</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ route('order.index') }}" class="dropdown-toggle  @yield('orders')">
                            <div class="active">
                                <i class="flaticon-map-1"></i>
                                <span>Customer Orders</span>
                            </div>
                        </a>
                    </li> --}}

                </ul>
            </nav>

        </div>

        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT PART  -->
      


            @yield('dashboardContent')


    </div>
    <!-- END MAIN CONTAINER -->

    <!--  BEGIN FOOTER  -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('dashboardAsset') }}/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('dashboardAsset') }}/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('dashboardAsset') }}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('dashboardAsset') }}/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{ asset('dashboardAsset') }}/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('dashboardAsset') }}/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->


    <!-- BEGIN PAGE LEVEL {{ asset('dashboardAsset') }}/plugins/CUSTOM SCRIPTS -->
    <script src="{{ asset('dashboardAsset') }}/plugins/charts/chartist/chartist.js"></script>
    <script src="{{ asset('dashboardAsset') }}/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="{{ asset('dashboardAsset') }}/plugins/maps/vector/jvector/worldmap_script/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('dashboardAsset') }}/plugins/calendar/pignose/moment.latest.min.js"></script>
    <script src="{{ asset('dashboardAsset') }}/plugins/calendar/pignose/pignose.calendar.js"></script>
    <script src="{{ asset('dashboardAsset') }}/plugins/progressbar/progressbar.min.js"></script>
    <script src="{{ asset('dashboardAsset') }}/assets/js/bootstrap-iconpicker.bundle.min.js"></script>
    <script src="{{ asset('dashboardAsset') }}/assets/js/default-dashboard/default-custom.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script src="{{ asset('dashboardAsset') }}/assets/js/support-chat.js"></script>
    <script src="{{ asset('dashboardAsset') }}/assets/js/tagify.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> --}}
    <!-- BEGIN PAGE LEVEL {{ asset('dashboardAsset') }}/plugins/CUSTOM SCRIPTS -->
    @yield('footerScript')
</body>
</html>