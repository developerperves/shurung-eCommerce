@extends('layouts.frontendApp')
@section('title')
    Blog | SHURUNG
@endsection
@section('frontendContent')
    
    <!-- page header image section -->
    <div class="page-header-img" style="background-image: url('{{ asset('assets/images') }}/{{ setting()->blog_bg }}')">
        <div class="container">
            <div class="page-header-img__wrapper">
                <h2 class="page-title">{{ setting()->blog_title }}</h2>
            </div>
        </div>
    </div>
    <!-- end page header image section -->
    <!-- breadcrumb section -->
    <div class="custom-breadcrumb custom-breadcrumb--minimal">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('blog') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- main content section -->
    <div class="main-content pb-150">
        <div class="container">
            <div class="row">
                <!-- blog post sidebar -->
                <!-- blog post sidebar -->
                <div class="col-lg-4 sidebar sidebar--right">

                    <!-- recent post widget -->
                    <div class="widget widget_recent_post">
                        <!-- popular blog posts -->
                        <h3 class="widget-title">{{ setting()->blog_recent_post }}</h3>
                        <ul class="media-list list-no-style">
                            @foreach ($blogs as $blog)
                            <li class="media-list__item">
                                <div class="media">
                                    <div class="media-list__item--img">
                                        <a href="{{ route('blog.detail', $blog->slug) }}"><img width="80px" src="{{ isset(json_decode($blog->photo,true)[0]) ?  asset('assets/images/'.json_decode($blog->photo,true)[0]) : asset('assets/images/placeholder.png')}}" alt="{{ json_decode($blog->photo,true)[0] }}"></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="{{ route('blog.detail', $blog->slug) }}">
                                            <h5 class="media-list__item--title">{{ Str::limit($blog->title, 50) }}</h5>
                                        </a>
                                        <div class="media-list__item--details">
                                            <a href="#" class="author">by Admin</a>
                                            <span class="date">{{ $blog->created_at->format('d M, y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- end recent post widget -->
                    <!-- categories widget -->
                    <div class="widget widget_categories">
                        <h3 class="widget-title">Categories</h3>
                        <ul class="widget-list list-no-style">
                            <li class="widget-list_item">
                                <a href="#">All categories<span class="item-badge">(52)</span></a>
                            </li>
                            <li class="widget-list_item">
                                <a href="#">Accessories<span class="item-badge">(12)</span></a>
                            </li>
                            <li class="widget-list_item">
                                <a href="#">Clothes<span class="item-badge">(15)</span></a>
                            </li>
                            <li class="widget-list_item">
                                <a href="#">Lifestyle<span class="item-badge">(23)</span></a>
                            </li>
                            <li class="widget-list_item">
                                <a href="#">Travel<span class="item-badge">(30)</span></a>
                            </li>
                            <li class="widget-list_item">
                                <a href="#">Journal<span class="item-badge">(10)</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- categories widget -->
                    <!-- social media widget -->
                    <div class="widget widget_social-media">
                        <h3 class="widget-title">Last News On Instagram</h3>
                        <div class="social-media-wrapper">
                            @foreach ($instagrams as $instagram)
                            <a href="{{ $instagram->link }}"><img src="{{ asset('assets/images') }}/{{ $instagram->photo }}" alt="{{ $instagram->photo }}"></a>
                            @endforeach
                        </div>
                    </div>
                    <!-- end social media widget -->
                    <!-- tags widget -->
                    <div class="widget widget_tag_cloud">
                        <h3 class="widget-title">Tags</h3>
                        <div class="tagcloud">
                            @foreach ($tags as $tag)
                                <a href="#">{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- end tags widget  -->
                    <!-- banner widget  -->
                    <div class="widget widget_banner">
                        <div class="sidebar-banner-slider slider-boxed">
                            @foreach ($sliders as $slider)
                            <div class="sidebar-banner-item img-hover-1">
                                <a href="#"><img src="{{ asset('assets/images') }}/{{ $slider->photo }}" alt="{{ $slider->photo }}"></a>
                                {{-- <div class="banner-item-content">
                                    <span>-30%</span>
                                </div> --}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- end banner widget  -->
                </div>
                <!-- end blog post sidebar -->
                <!-- end blog post sidebar -->
                <!-- blog post -->
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($blogs as $blog)
                        <div class="col-12">
                            <div class="blog-post-card blog-post--block img-hover-4">
                                <div class="blog-post-image">
                                    <a href="{{ route('blog.detail', $blog->slug) }}">
                                        <img src="{{ isset(json_decode($blog->photo,true)[0]) ?  asset('assets/images/'.json_decode($blog->photo,true)[0]) : asset('assets/images/placeholder.png')}}" alt="{{ json_decode($blog->photo,true)[0] }}">
                                    </a>
                                </div>
                                <div class="blog-post-body">
                                    <div class="post-meta">
                                        <div class="post-author">
                                            <a href="#">By Admin</a>
                                        </div>
                                        <div class="post-date">
                                            {{ $blog->created_at->format('d M, y') }}
                                        </div>
                                    </div>
                                    <a href="{{ route('blog.detail', $blog->slug) }}">
                                        <h3 class="post-title">{{ $blog->title }}</h3>
                                    </a>
                                    <div class="post-summery">
                                        <p>{{ strlen(strip_tags($blog->details)) > 120 ? substr(strip_tags($blog->details), 0, 120) : strip_tags($blog->details) }}</p>
                                    </div>
                                    <div class="post-btn">
                                        <a href="{{ route('blog.detail', $blog->slug) }}" class="button button--link">Read more</a>
                                    </div>
                                    <div class="post-social-share">
                                        <span class="social-share-text">Share:</span>
                                        <ul class="social-share-list">
                                            <li>
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
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
                <!-- end blog post -->
            </div>

        </div>
    </div>
    <!-- end main content section -->
@endsection