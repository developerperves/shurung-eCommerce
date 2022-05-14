@extends('layouts.frontendApp')
@section('title')
    About Us | SHURUNG
@endsection
@section('frontendContent')
 <!-- breadcrumb section -->
 <div class="custom-breadcrumb custom-breadcrumb--minimal">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About us</li>
            </ol>
        </nav>
    </div>
</div>
<!-- end breadcrumb section -->
<!-- main content section -->
<div class="main-content pb-150">
    <div class="container">
        <!-- about us section -->
        <div class="grid-section">
            <div class="row">
                <div class="col-lg-6">
                    <div class="grid-section_img grid-section--mb">
                        <div class="img-group-single">
                            <img src="{{ asset('assets/images') }}/{{ setting()->about_story_bottom_photo }}" alt="{{ setting()->about_story_bottom_photo }}">
                        </div>
                        <div class="img-group-single">
                            <img src="{{ asset('assets/images') }}/{{ setting()->about_story_top_photo }}" alt="{{ setting()->about_story_top_photo }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="grid-section_content">
                        <h3 class="section-title">{{ setting()->about_story_heading }}</h3>
                        <p>{{ setting()->about_story_description }}</p>
                        <div class="blockquote">
                            <p>{{ setting()->about_story_quote }}</p>
                        </div>
                        <div class="section-logo">
                            <img src="{{ asset('assets/images') }}/{{ setting()->nav_logo }}" alt="{{ setting()->nav_logo }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid-section pt-150">
            <div class="row">
                <div class="col-lg-6">
                    <div class="grid-section_content grid-section--mb">
                        <h3 class="section-title">{{ setting()->about_shop_heading }}</h3>
                        <p>{{ setting()->about_shop_description }}</p>
                        <div class="section-info">
                            <div class="info-item">
                                <h6>Address:</h6>
                                <span>{{ setting()->address }}</span>
                            </div>
                            <div class="info-item">
                                <h6>Phone:</h6>
                                <span>{{ setting()->phone }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="grid-section_img grid-section--mb">
                        <div class="img-group-single">
                            <img src="{{ asset('assets/images') }}/{{ setting()->about_shop_bottom_photo }}" alt="{{ setting()->about_shop_bottom_photo }}">
                        </div>
                        <div class="img-group-single">
                            <img src="{{ asset('assets/images') }}/{{ setting()->about_shop_top_photo }}" alt="{{ setting()->about_shop_top_photo }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end about us section -->

        <!-- portfolio section -->
        <div class="portfolio-section pt-150">
            <ul class="nav nav-pills portfolio_navs" id="pills-tab" role="tablist">
                @foreach ($latest_product as $latest)
                <li class="nav-item">
                    <a class="nav-link {{ $loop->index+1 == 1 ? 'active' : ''}}" id="pills-one-tab" data-toggle="pill" href="#pills-{{ $latest->year }}" role="tab"
                        aria-controls="pills-one" aria-selected="true">{{ $latest->year }}</a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content portfolio_content" id="pills-tabContent">
                @foreach ($latest_product as $latest)
                <div class="tab-pane fade {{ $loop->index+1 == 1 ? 'show active' : ''}}" id="pills-{{ $latest->year }}" role="tabpanel"
                    aria-labelledby="pills-one-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="portfolio-img"
                                style="background-image: url('{{ asset('assets/images') }}/{{ $latest->thumbnail }}')">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="portfolio-content-box">
                                <h4>{{ $latest->heading }}</h4>
                                <p>{{ $latest->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!-- end portfolio section -->
    </div>
    <div class="light-bg py-60 mt-150">
        <div class="container">
            <!-- gallery section -->
            <div class="masonry-gallery">
                @forelse ($best_products as $best)
                <div class="gallery__item img-hover-5">
                    <a href="{{ route('product.detail', $best->slug) }}"><img src="{{ asset('assets/images') }}/{{ $best->photo }}" alt="{{ $best->photo }}">
                        <div class="item-content hover-overlay">
                            <span>SHURUNG</span>
                            <h4 class="title">Our Best Product</h4>
                        </div>
                    </a>
                </div>
                    
                @empty
                <p>No Product Yet</p>
                @endforelse
            </div>
            <!-- end gallery section -->
            <!-- team section -->
            <div class="team-slider pt-150">
                @foreach ($teams as $team)
                <div class="team-card img-hover-6">
                    <div class="team-img">
                        <img src="{{ asset('assets/images') }}/{{ $team->photo }}" alt="{{ $team->photo }}">
                    </div>
                    <div class="team-info hover-overlay">
                        <span class="name">{{ $team->name }}</span>
                        <span class="position">{{ $team->designation }}</span>
                        <ul class="social-media-list">
                            @if ($team->linkedin_link != null)
                            <li>
                                <a href="{{ $team->linkedin_link }}"  target="_blank" class="list_item linkedin"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            @endif
                            @if ($team->twitter_link != null)
                            <li>
                                <a href="{{ $team->twitter_link }}" target="_blank" class="list_item twitter"><i class="fab fa-twitter"></i></a>
                            </li>
                            @endif
                            
                            @if ($team->instagram_link != null)
                            <li>
                                <a href="{{ $team->instagram_link }}" target="_blank" class="list_item instagram"><i class="fab fa-instagram"></i></a>
                            </li>
                            @endif
                            
                            @if ($team->facebook_link != null)
                            <li>
                                <a href="{{ $team->facebook_link }}" target="_blank" class="list_item facebook"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- end team section -->
        </div>
    </div>
    <div class="container">
        <!-- blog post section -->
        <div class="pt-150">
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
                                <img src="{{ isset(json_decode($blog->photo,true)[0]) ?  asset('assets/images/'.json_decode($blog->photo,true)[0]) : asset('assets/images/placeholder.png')}}" alt="{{ $blog->photo }}">
                            </a>
                        </div>
                        <div class="blog-post-body">
                            <div class="post-meta">
                                <div class="post-author">
                                    <a href="#">By Admin</a>
                                </div>
                                <div class="post-date">{{ $blog->created_at->format('d M, y') }}</div>
                            </div>
                            <a href="{{ route('blog.detail', $blog->slug) }}">
                                <h3 class="post-title">{{ Str::limit($blog->title, 50) }}</h3>
                            </a>
                            <div class="post-summery">
                                <p>{!! Str::limit($blog->details, 120) !!}</p>
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
        <!-- end blog post section -->
    </div>
</div>
<!-- end main content section -->
    
@endsection