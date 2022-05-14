@extends('layouts.dashboardApp')
@section('addetional_css')
<link href="{{ asset('dashboardAsset') }}/assets/css/ecommerce/addedit_categories.css" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Manage Website | Dashboard
@endsection
@section('dashboardContent')

<div  id="content"  class="main-content">
    <div class="container container-fluid">
    
        <!-- Page Heading -->
        <div class="card mb-4 mt-5">
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3 class="mb-0 bc-title"><b>{{ __('Basic Information') }}</b></h3>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-lg-12">
                @include('alerts.alerts')
            </div>
        </div>
    
        <div class="row">
    
            <div class="col-xl-12 col-lg-12 col-md-12">
    
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body ">
                        <!-- Nested Row within Card Body -->
                            <form class="admin-form" action="{{ route('setting.update') }}" method="POST"
                                        enctype="multipart/form-data">
    
                                        @csrf
    
    
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="nav flex-column m-3 nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" data-toggle="pill" href="#media">{{ __('Media') }}</a>
                                            <a class="nav-link" data-toggle="pill" href="#social_icons">{{ __('Social Icons') }}</a>
                                                <a class="nav-link" data-toggle="pill" href="#basic_info">{{ __('Basic Info') }}</a>
                                                <a class="nav-link" data-toggle="pill" href="#page_banners">{{ __('Page Banners') }}</a>
                                                <a class="nav-link" data-toggle="pill" href="#individual_heading">{{ __('Individual Heading') }}</a>
                                                <a class="nav-link" data-toggle="pill" href="#about_story">{{ __('About Story') }}</a>
                                                <a class="nav-link" data-toggle="pill" href="#about_shop">{{ __('About Shop') }}</a>
                                                <a class="nav-link" data-toggle="pill" href="#contact_page_setting">{{ __('Contact Page Setting') }}</a>
                                                <a class="nav-link" data-toggle="pill" href="#footer_setting">{{ __('Footer Setting') }}</a>
                                                <a class="nav-link" data-toggle="pill" href="#company_policies">{{ __('Company Policies') }}</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9">
    
    
                                            <input type="hidden" name="is_validate" value="1">
    
                                            <div class="">
                                                <div id="tabs">
                                                <!-- Tab panes -->
                                                <div class="tab-content">
    
                                                    <div id="media" class="tab-pane active"><br>
        
                                                        <div class="row justify-content-center">
        
                                                            <div class="col-lg-8">
        
                                                                <ul class="nav nav-pills nav-justified nav-secondary nav-pills-no-bd">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-toggle="pill" href="#nav_logo">{{ __('Navigation Logo') }}</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="pill" href="#footer_logo">{{ __('Footer Logo') }}</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="pill" href="#favicon">{{ __('Favicon') }}</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="pill" href="#collection_banner">{{ __('Collection Banner') }}</a>
                                                                    </li>
                                                                </ul>
        
                                                                <div class="tab-content">
        
                                                                    <div id="nav_logo" class="container tab-pane active"><br>
                                                                    <div class="row justify-content-center">
        
                                                                        <div class="col-lg-12 ">
        
                                                                            <div class="form-group">
                                                                                <label for="name">{{ __('Current Image') }}</label>
                                                                                <div class="col-lg-12 pb-1">
                                                                                    <img class="admin-setting-img"
                                                                                        src="{{ $setting->nav_logo ? asset('assets/images/'.$setting->nav_logo) : asset('assets/images/placeholder.png') }}"
                                                                                        alt="No Image Found">
                                                                                </div>
                                                                            </div>
        
                                                                            <div class="form-group position-relative ">
                                                                                <label class="file">
                                                                                    <input type="file"  accept="image/*"  class="upload-photo" name="nav_logo" id="file" aria-label="File browser example">
                                                                                    <span class="file-custom text-left">{{ __('Size: 100 x 100') }}</span>
                                                                                </label>
                                                                            </div>
        
                                                                        </div>
        
                                                                    </div>
                                                                    </div>
        
                                                                    <div id="footer_logo" class="container tab-pane"><br>
                                                                        <div class="row justify-content-center">
        
                                                                            <div class="col-lg-12">
        
                                                                                <div class="form-group">
                                                                                    <label for="name">{{ __('Current Image') }}</label>
                                                                                    <div class="col-lg-12 pb-1">
                                                                                        <img class="admin-setting-img my-mw-100"
                                                                                            src="{{ $setting->footer_logo ? asset('assets/images/'.$setting->footer_logo) : asset('assets/images/placeholder.png') }}"
                                                                                            alt="No Image Found">
                                                                                    </div>
                                                                                    <span>{{ __('Image Size Should Be 140 x 75.') }}</span>
                                                                                </div>
        
                                                                                <div class="form-group position-relative ">
                                                                                    <label class="file">
                                                                                        <input type="file"  accept="image/*"  class="upload-photo" name="footer_logo" id="file" aria-label="File browser example">
                                                                                        <span class="file-custom text-left">{{ __('Upload Image...') }}</span>
                                                                                    </label>
                                                                                </div>
        
                                                                            </div>
        
                                                                        </div>
                                                                    </div>
        
                                                                    <div id="favicon" class="container tab-pane"><br>
                                                                        <div class="row justify-content-center">
        
                                                                            <div class="col-lg-12">
        
                                                                                <div class="form-group">
                                                                                    <label for="name">{{ __('Current Image') }}</label>
                                                                                    <div class="col-lg-12 pb-1">
                                                                                        <img class="admin-setting-img my-mw-100"
                                                                                            src="{{ $setting->favicon ? asset('assets/images/'.$setting->favicon) : asset('assets/images/placeholder.png') }}"
                                                                                            alt="No Image Found">
                                                                                    </div>
                                                                                    <span>{{ __('Image Size Should Be 16 x 16.') }}</span>
                                                                                </div>
        
                                                                                <div class="form-group position-relative ">
                                                                                    <label class="file">
                                                                                        <input type="file"  accept="image/*"  class="upload-photo" name="favicon" id="file" aria-label="File browser example">
                                                                                        <span class="file-custom text-left">{{ __('Upload Image...') }}</span>
                                                                                    </label>
                                                                                </div>
        
                                                                            </div>
        
                                                                        </div>
                                                                    </div>
        
                                                                    <div id="collection_banner" class="container tab-pane"><br>
                                                                        <div class="row justify-content-center">
        
                                                                            <div class="col-lg-12">
        
                                                                                <div class="form-group">
                                                                                    <label for="name">{{ __('Current Image') }}</label>
                                                                                    <div class="col-lg-12 pb-1">
                                                                                        <img class="admin-setting-img my-mw-100 w-100"
                                                                                            src="{{ $setting->new_collection_banner ? asset('assets/images/'.$setting->new_collection_banner) : asset('assets/images/placeholder.png') }}"
                                                                                            alt="No Image Found">
                                                                                    </div>
                                                                                    <span>{{ __('Image Size Should Be 730 x 350.') }}</span>
                                                                                </div>
        
                                                                                <div class="form-group position-relative ">
                                                                                    <label class="file">
                                                                                        <input type="file"  accept="image/*"  class="upload-photo" name="new_collection_banner" id="file" aria-label="File browser example">
                                                                                        <span class="file-custom text-left">{{ __('Upload Image...') }}</span>
                                                                                    </label>
                                                                                </div>
        
                                                                            </div>
        
                                                                        </div>
                                                                    </div>
        
                                                                </div>
                                                            </div>
                                                        </div>
        
                                                    </div>
        
                                                    <div id="basic_info" class="tab-pane"><br>
        
                                                            <div class="row justify-content-center">
        
                                                                <div class="col-lg-8">
                                                                    <div class="form-group">
                                                                        <label for="address">{{ __('Office Address') }} *</label>
                                                                        <input type="text" name="address" class="form-control" id="address"
                                                                            placeholder="{{ __('Office Address') }}" value="{{ $setting->address }}" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="phone">{{ __('Phone No') }} *</label>
                                                                        <input type="text" name="phone" class="form-control" id="phone"
                                                                            placeholder="{{ __('Phone No') }}" value="{{ $setting->phone }}" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="office_time_day">{{ __('Office Time (day)') }} *</label>
                                                                        <input type="text" name="office_time_day" class="form-control" id="office_time_day"
                                                                            placeholder="{{ __('Office Time (Day)') }}" value="{{ $setting->office_time_day }}" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="office_time_hour">{{ __('Office Time (Hour)') }} *</label>
                                                                        <input type="text" name="office_time_hour" class="form-control" id="office_time_hour"
                                                                            placeholder="{{ __('Office Time (Hour)') }}" value="{{ $setting->office_time_hour }}" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">{{ __('Email Address') }} *</label>
                                                                        <input type="text" name="email" class="form-control" id="email"
                                                                            placeholder="{{ __('Email Address') }}" value="{{ $setting->email }}" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="insta_profile">{{ __('Instagram Profile') }} *</label>
                                                                        <input type="text" name="insta_profile" class="form-control" id="insta_profile"
                                                                            placeholder="{{ __('Instagram Profile') }}" value="{{ $setting->insta_profile }}">
                                                                    </div>
                                                                </div>
        
                                                            </div>
        
                                                    </div>
                                                    
        
                                                    <div id="individual_heading" class="tab-pane"><br>
        
                                                        <div class="row justify-content-center">
    
                                                            <div class="col-lg-8">
                                                                <div class="form-group">
                                                                    <label for="blog_heading">{{ __('Blog Heading') }} *</label>
                                                                    <input type="text" name="blog_heading" class="form-control" id="blog_heading"
                                                                        placeholder="{{ __('Blog Heading') }}" value="{{ $setting->blog_heading }}" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="blog_detail_related_heading">{{ __('Blog detail Related Heading') }} *</label>
                                                                    <input type="text" name="blog_detail_related_heading" class="form-control" id="blog_detail_related_heading"
                                                                        placeholder="{{ __('Blog detail Related Heading') }}" value="{{ $setting->blog_detail_related_heading }}" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="blog_recent_post">{{ __('Blog Recent Post') }} *</label>
                                                                    <input type="text" name="blog_recent_post" class="form-control" id="blog_recent_post"
                                                                        placeholder="{{ __('Blog Recent Post') }}" value="{{ $setting->blog_recent_post }}" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="new_product_heading">{{ __('New Product Heading') }} *</label>
                                                                    <input type="text" name="new_product_heading" class="form-control" id="new_product_heading"
                                                                        placeholder="{{ __('New Product Heading') }}" value="{{ $setting->new_product_heading }}" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="best_product_heading">{{ __('Best Product Heading') }} *</label>
                                                                    <input type="text" name="best_product_heading" class="form-control" id="best_product_heading"
                                                                        placeholder="{{ __('Best Product Heading') }}" value="{{ $setting->best_product_heading }}" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="product_detail_related_heading">{{ __('Product Detail Related Heading') }} *</label>
                                                                    <input type="text" name="product_detail_related_heading" class="form-control" id="product_detail_related_heading"
                                                                        placeholder="{{ __('Product Detail Related Heading') }}" value="{{ $setting->product_detail_related_heading }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="insta_heading">{{ __('Instagram Heading') }} *</label>
                                                                    <input type="text" name="insta_heading" class="form-control" id="insta_heading"
                                                                        placeholder="{{ __('Instagram Heading') }}" value="{{ $setting->insta_heading }}">
                                                                </div>
                                                            </div>
    
                                                        </div>
    
                                                </div>
                                                    <div id="footer_setting" class="tab-pane"><br>
        
                                                            <div class="row justify-content-center">
        
                                                                <div class="col-lg-8">
                                                                    <div class="form-group">
                                                                        <label for="footer_about_heading">{{ __('Footer About Heading') }} *</label>
                                                                        <input type="text" name="footer_about_heading" class="form-control" id="footer_about_heading"
                                                                            placeholder="{{ __('Footer About Heading') }}" value="{{ $setting->footer_about_heading }}" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="footer_about_description">{{ __('Footer About Description') }} *</label>
                                                                        <textarea name="footer_about_description" rows="4" class="form-control" placeholder="Footer About Description">{{ $setting->footer_about_description }}</textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="copyright">{{ __('Copyright') }} *</label>
                                                                        <input type="text" name="copyright" class="form-control" id="copyright"
                                                                            placeholder="{{ __('Copyright') }}" value="{{ $setting->copyright }}" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="payment_getway_image">{{ __('Payment Getway Image') }} *</label>
                                                                        <input type="file" name="payment_getway_image" class="form-control" id="payment_getway_image">
                                                                    </div>
                                                                    <img class="w-100"  src="{{ asset('assets/images') }}/{{ $setting->payment_getway_image }}" alt="{{ $setting->payment_getway_image }}">
                                                                </div>
        
                                                            </div>
        
                                                    </div>
                                                    
        
                                                    <div id="about_story" class="tab-pane"><br>
        
                                                        <div class="row justify-content-center">
        
                                                            <div class="col-lg-8">
        
                                                                <ul class="nav nav-pills nav-justified nav-secondary nav-pills-no-bd">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-toggle="pill" href="#about_detail">{{ __('About Story Detail') }}</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="pill" href="#about_top">{{ __('Top Photo') }}</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="pill" href="#about_bottom">{{ __('Bottom Photo') }}</a>
                                                                    </li>
                                                                </ul>
        
                                                                <div class="tab-content">
        
                                                                    <div id="about_detail" class="container tab-pane active"><br>
                                                                        <div class="row justify-content-center">
            
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                        <label for="about_story_heading">Heading</label>
                                                                                        <input type="text"  class="form-control" name="about_story_heading"  value="{{ $setting->about_story_heading }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="about_story_description">Description</label>
                                                                                        <textarea name="about_story_description" rows="4" class="form-control">{{ $setting->about_story_description }}</textarea>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="about_story_quote">Quote</label>
                                                                                        <textarea name="about_story_quote" rows="4" class="form-control">{{ $setting->about_story_quote }}</textarea>
                                                                                </div>
            
                                                                            </div>
            
                                                                        </div>
                                                                    </div>
        
                                                                    <div id="about_top" class="container tab-pane"><br>
                                                                        <div class="row justify-content-center">
        
                                                                            <div class="col-lg-12">
        
                                                                                <div class="form-group">
                                                                                    <label for="name">{{ __('Current Image') }}</label>
                                                                                    <div class="col-lg-12 pb-1">
                                                                                        <img class="admin-setting-img my-mw-100"
                                                                                            src="{{ $setting->about_story_top_photo ? asset('assets/images/'.$setting->about_story_top_photo) : asset('assets/images/placeholder.png') }}"
                                                                                            alt="No Image Found">
                                                                                    </div>
                                                                                    <span>{{ __('Image Size Should Be 430 x 280.') }}</span>
                                                                                </div>
        
                                                                                <div class="form-group position-relative ">
                                                                                    <label class="file">
                                                                                        <input type="file"  accept="image/*"  class="upload-photo" name="about_story_top_photo" id="file" aria-label="File browser example">
                                                                                        <span class="file-custom text-left">{{ __('Upload Image...') }}</span>
                                                                                    </label>
                                                                                </div>
        
                                                                            </div>
        
                                                                        </div>
                                                                    </div>
        
                                                                    <div id="about_bottom" class="container tab-pane"><br>
                                                                        <div class="row justify-content-center">
        
                                                                            <div class="col-lg-12">
        
                                                                                <div class="form-group">
                                                                                    <label for="name">{{ __('Current Image') }}</label>
                                                                                    <div class="col-lg-12 pb-1">
                                                                                        <img class="admin-setting-img my-mw-100 w-100"
                                                                                            src="{{ $setting->about_story_bottom_photo ? asset('assets/images/'.$setting->about_story_bottom_photo) : asset('assets/images/placeholder.png') }}"
                                                                                            alt="No Image Found">
                                                                                    </div>
                                                                                    <span>{{ __('Image Size Should Be 305 x 455.') }}</span>
                                                                                </div>
        
                                                                                <div class="form-group position-relative ">
                                                                                    <label class="file">
                                                                                        <input type="file"  accept="image/*"  class="upload-photo" name="about_story_bottom_photo" id="file" aria-label="File browser example">
                                                                                        <span class="file-custom text-left">{{ __('Upload Image...') }}</span>
                                                                                    </label>
                                                                                </div>
        
                                                                            </div>
        
                                                                        </div>
                                                                    </div>
        
                                                                </div>
                                                            </div>
                                                        </div>
        
                                                    </div>
                                                    
        
                                                    <div id="page_banners" class="tab-pane"><br>
        
                                                        <div class="row justify-content-center">
        
                                                            <div class="col-lg-8">
        
                                                                <ul class="nav nav-pills nav-justified nav-secondary nav-pills-no-bd">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-toggle="pill" href="#new_arraival">{{ __('New Arraival') }}</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="pill" href="#blog">{{ __('Blog') }}</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="pill" href="#wish">{{ __('Wish') }}</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="pill" href="#search">{{ __('Search') }}</a>
                                                                    </li>
                                                                </ul>
        
                                                                <div class="tab-content">
        
                                                                    <div id="new_arraival" class="container tab-pane active"><br>
                                                                        <div class="row justify-content-center">
            
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                        <label for="arraivle_title">Banner title</label>
                                                                                        <input type="text"  class="form-control" name="arraivle_bg"  value="{{ $setting->arraivle_title }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="arraivle_bg">Banner BG</label>
                                                                                        <input type="file"  class="form-control" name="arraivle_bg">
                                                                                </div>
                                                                                <img class="w-100" src="{{ asset('assets/images') }}/{{ $setting->arraivle_bg }}" alt="{{ $setting->arraivle_bg }}">
            
                                                                            </div>
            
                                                                        </div>
                                                                    </div>
        
                                                                    <div id="blog" class="container tab-pane"><br>
                                                                        <div class="row justify-content-center">
            
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                        <label for="blog_title">Banner title</label>
                                                                                        <input type="text"  class="form-control" name="blog_title"  value="{{ $setting->blog_title }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="blog_bg">Banner BG</label>
                                                                                        <input type="file"  class="form-control" name="blog_bg">
                                                                                </div>
                                                                                <img class="w-100" src="{{ asset('assets/images') }}/{{ $setting->blog_bg }}" alt="{{ $setting->blog_bg }}">
            
                                                                            </div>
            
                                                                        </div>
                                                                    </div>
        
                                                                    <div id="wish" class="container tab-pane"><br>
                                                                        <div class="row justify-content-center">
            
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                        <label for="blog_title">Banner title</label>
                                                                                        <input type="text"  class="form-control" name="wish_banner_heading"  value="{{ $setting->wish_banner_heading }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="blog_bg">Banner BG</label>
                                                                                        <input type="file"  class="form-control" name="wish_banner_bg">
                                                                                </div>
                                                                                <img class="w-100" src="{{ asset('assets/images') }}/{{ $setting->wish_banner_bg }}" alt="{{ $setting->wish_banner_bg }}">
            
                                                                            </div>
            
                                                                        </div>
                                                                    </div>
        
                                                                    <div id="search" class="container tab-pane"><br>
                                                                        <div class="row justify-content-center">
            
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                        <label for="blog_title">Banner title</label>
                                                                                        <input type="text"  class="form-control" name="serch_banner_heading"  value="{{ $setting->serch_banner_heading }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="blog_bg">Banner BG</label>
                                                                                        <input type="file"  class="form-control" name="serch_banner_bg">
                                                                                </div>
                                                                                <img class="w-100" src="{{ asset('assets/images') }}/{{ $setting->serch_banner_bg }}" alt="{{ $setting->serch_banner_bg }}">
            
                                                                            </div>
            
                                                                        </div>
                                                                    </div>
        
                                                                </div>
                                                            </div>
                                                        </div>
        
                                                    </div>
        
                                                    <div id="about_shop" class="tab-pane"><br>
        
                                                        <div class="row justify-content-center">
        
                                                            <div class="col-lg-8">
        
                                                                <ul class="nav nav-pills nav-justified nav-secondary nav-pills-no-bd">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-toggle="pill" href="#shop_detail">{{ __('About Shop Detail') }}</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="pill" href="#shop_top">{{ __('Top Photo') }}</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="pill" href="#shop_bottom">{{ __('Bottom Photo') }}</a>
                                                                    </li>
                                                                </ul>
        
                                                                <div class="tab-content">
        
                                                                    <div id="shop_detail" class="container tab-pane active"><br>
                                                                        <div class="row justify-content-center">
            
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                        <label for="about_shop_heading">Heading</label>
                                                                                        <input type="text"  class="form-control" name="about_shop_heading"  value="{{ $setting->about_shop_heading }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="about_shop_description">Description</label>
                                                                                        <textarea name="about_shop_description" rows="4" class="form-control">{{ $setting->about_shop_description }}</textarea>
                                                                                </div>
            
                                                                            </div>
            
                                                                        </div>
                                                                    </div>
        
                                                                    <div id="shop_top" class="container tab-pane"><br>
                                                                        <div class="row justify-content-center">
        
                                                                            <div class="col-lg-12">
        
                                                                                <div class="form-group">
                                                                                    <label for="name">{{ __('Current Image') }}</label>
                                                                                    <div class="col-lg-12 pb-1">
                                                                                        <img class="admin-setting-img my-mw-100"
                                                                                            src="{{ $setting->about_shop_top_photo ? asset('assets/images/'.$setting->about_shop_top_photo) : asset('assets/images/placeholder.png') }}"
                                                                                            alt="No Image Found">
                                                                                    </div>
                                                                                    <span>{{ __('Image Size Should Be 430 x 280.') }}</span>
                                                                                </div>
        
                                                                                <div class="form-group position-relative ">
                                                                                    <label class="file">
                                                                                        <input type="file"  accept="image/*"  class="upload-photo" name="about_shop_top_photo" id="file" aria-label="File browser example">
                                                                                        <span class="file-custom text-left">{{ __('Upload Image...') }}</span>
                                                                                    </label>
                                                                                </div>
        
                                                                            </div>
        
                                                                        </div>
                                                                    </div>
        
                                                                    <div id="shop_bottom" class="container tab-pane"><br>
                                                                        <div class="row justify-content-center">
        
                                                                            <div class="col-lg-12">
        
                                                                                <div class="form-group">
                                                                                    <label for="name">{{ __('Current Image') }}</label>
                                                                                    <div class="col-lg-12 pb-1">
                                                                                        <img class="admin-setting-img my-mw-100 w-100"
                                                                                            src="{{ $setting->about_shop_bottom_photo ? asset('assets/images/'.$setting->about_shop_bottom_photo) : asset('assets/images/placeholder.png') }}"
                                                                                            alt="No Image Found">
                                                                                    </div>
                                                                                    <span>{{ __('Image Size Should Be 305 x 455.') }}</span>
                                                                                </div>
        
                                                                                <div class="form-group position-relative ">
                                                                                    <label class="file">
                                                                                        <input type="file"  accept="image/*"  class="upload-photo" name="about_shop_bottom_photo" id="file" aria-label="File browser example">
                                                                                        <span class="file-custom text-left">{{ __('Upload Image...') }}</span>
                                                                                    </label>
                                                                                </div>
        
                                                                            </div>
        
                                                                        </div>
                                                                    </div>
        
                                                                </div>
                                                            </div>
                                                        </div>
        
                                                    </div>
                                                    
                                                    <div id="contact_page_setting" class="tab-pane"><br>
        
                                                        <div class="row justify-content-center">
    
                                                            <div class="col-lg-8">
                                                                <div class="form-group">
                                                                    <label for="contact_detail_heading">{{ __('Contact Detail Heaidng') }} *</label>
                                                                    <input type="text" name="contact_detail_heading" class="form-control" id="contact_detail_heading"
                                                                        placeholder="{{ __('Contact Detail Heading') }}" value="{{ $setting->contact_detail_heading }}" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="contact_detail_description">{{ __('Contact Detail Description') }} *</label>
                                                                    <textarea name="contact_detail_description" rows="4" class="form-control">{{ $setting->contact_detail_description }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="map">{{ __('Map Location') }} *</label>
                                                                    <textarea name="map" rows="4" class="form-control">{{ $setting->map }}</textarea>
                                                                </div>
                                                            </div>
    
                                                        </div>
    
                                                </div>
        
                                                    <div id="company_policies" class="tab-pane"><br>
        
                                                        <div class="row justify-content-center">
        
                                                            <div class="col-lg-8">
        
                                                                <ul class="nav nav-pills nav-justified nav-secondary nav-pills-no-bd">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-toggle="pill" href="#terms__conditions">{{ __('Terms & Conditions') }}</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="pill" href="#privecy__policy">{{ __('Privecy & Policy') }}</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="pill" href="#return__refund">{{ __('Return & Refund') }}</a>
                                                                    </li>
                                                                </ul>
        
                                                                <div class="tab-content">
        
                                                                    <div id="terms__conditions" class="container tab-pane active"><br>
                                                                        <div class="row justify-content-center">
            
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                        <label for="terms_&_conditions">Terms & Conditions</label>
                                                                                        <textarea id="terms_conditions" name="terms_conditions" rows="4" class="form-control">{!! $setting->terms_conditions !!}</textarea>                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
        
                                                                    <div id="privecy__policy" class="container tab-pane"><br>
                                                                        <div class="row justify-content-center">
            
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                        <label for="privecy_policy">Privecy & Policy</label>
                                                                                        <textarea id="privecy_policy" name="privecy_policy" rows="4" class="form-control">{!! $setting->privecy_policy !!}</textarea>
                                                                                </div>
            
                                                                            </div>
            
                                                                        </div>
                                                                    </div>
        
                                                                    <div id="return__refund" class="container tab-pane"><br>
                                                                        <div class="row justify-content-center">
            
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                        <label for="return_refund">Return & Refund</label>
                                                                                        <textarea id="return_refund" name="return_refund" rows="4" class="form-control">{!! $setting->return_refund !!}</textarea>
                                                                                </div>
            
                                                                            </div>
            
                                                                        </div>
                                                                    </div>
        
                                                                </div>
                                                            </div>
                                                        </div>
        
                                                    </div>
        
                                                    <div id="social_icons" class="tab-pane"><br>
        
                                                            <div class="row justify-content-center">
                                                                
                                                                <div class="col-lg-12">
                                                                    <div id="social-section">
                                                                        @php
                                                                            $links = json_decode($setting->social_link,true)['links'];
                                                                            $icons = json_decode($setting->social_link,true)['icons'];
                                                                        @endphp
                                                                        @foreach ($links as $link_key => $link)
                                                                        <div class="d-flex">
                                                                            <div>
                                                                                <div class="form-group">
                                                                                    <button
                                                                                        class="btn btn-secondary social-picker"
                                                                                        name="social_icons[]"
                                                                                        data-icon="{{$icons[$link_key]}}">
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control"
                                                                                        name="social_links[]"
                                                                                        placeholder="{{ __('Social Link') }}" value="{{$link}}">
                                                                                </div>
                                                                                    
                                                                            </div>
                                                                            <div class="flex-btn">
                                                                                <button type="button" class="btn btn-success add-social" data-text="{{ __('Social Link') }}"> <i class="fa fa-plus"></i> </button>
                                                                            </div>
                                                                            <div class="flex-btn">
                                                                                <button type="button" class="btn btn-danger remove-social">
                                                                                    <i class="flaticon-circle-cross"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach



                                                                    </div>

                                                                </div>
                                                            </div>
        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            <button type="submit" class="btn btn-secondary ">{{ __('Submit') }}</button>
                                        </div>
    
    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footerScript')
<script type="text/javascript">

        // Social Picker
        if( $('.social-picker').length > 0 ){
            $('.social-picker').iconpicker();
        }



        
        // Appending Social Icons To Items
        $('.add-social').on('click',function(){
            var text = $(this).data('text');
            $('#social-section').append(`
                <div class="d-flex">
                    <div>
                        <div class="form-group">
                            <button
                                class="btn btn-secondary social-picker"
                                name="social_icons[]"
                                data-icon="fab fa-font-awesome">
                            </button>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="form-group mb-1"><input type="text"
                                class="form-control"
                                name="social_links[]"
                                placeholder="${text}">
                        </div>
                    </div>
                    <div class="flex-btn">
                        <button type="button"
                            class="btn btn-danger remove-social">
                            <i class="flaticon-circle-cross"></i>
                        </button>
                    </div>
                </div>
            `);

            $('.social-picker').iconpicker();
            
        $(document).on('click','.remove-social',function(){
            $(this).parent().parent().remove();
        });

        });
</script>
    
<script type="text/javascript">
    $(document).ready(function(){
      ClassicEditor
        .create( document.querySelector( '#terms_conditions' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
  
  
    });
    $(document).ready(function(){
      ClassicEditor
        .create( document.querySelector( '#return_refund' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
  
  
    });
    $(document).ready(function(){
      ClassicEditor
        .create( document.querySelector( '#privecy_policy' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
  
  
    });
  </script>
@endsection