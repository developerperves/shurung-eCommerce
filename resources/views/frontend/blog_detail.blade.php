@extends('layouts.frontendApp')
@section('title')
    Blog Detail | SHURUNG
@endsection
@section('frontendContent')
     <!-- breadcrumb section -->
     <div class="custom-breadcrumb custom-breadcrumb--minimal">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($blog_info->title, 50) }}</li>
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
                <div class="col-lg-4 sidebar sidebar--right">

                    <!-- recent post widget -->
                    <div class="widget widget_recent_post">
                        <!-- popular blog posts -->
                        <h3 class="widget-title"> {{ setting()->blog_detail_related_heading }}</h3>
                        <ul class="media-list list-no-style">
                            @forelse ($related_blog as $related)
                            <li class="media-list__item">
                                <div class="media">
                                    <div class="media-list__item--img">
                                        <a href="{{ route('blog.detail', $related->slug) }}"><img width="50px" src="{{ isset(json_decode($related->photo,true)[0]) ?  asset('assets/images/'.json_decode($related->photo,true)[0]) : asset('assets/images/placeholder.png')}}" alt="Photo not found"></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="#">
                                            <h5 class="media-list__item--title">{{ Str::limit($related->title, 30) }}</h5>
                                        </a>
                                        <div class="media-list__item--details">
                                            <a href="#" class="author">by Admin</a>
                                            <span class="date">{{ $related->created_at->format('d M, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @empty
                            <p>No related blog yet!</p>    
                            @endforelse
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
                        <h3 class="widget-title">{{ setting()->insta_heading }}</h3>
                        <div class="social-media-wrapper">
                            @forelse ($instagrams as $instagram)
                            <a href="{{ $instagram->link }}"><img src="{{ $instagram->photo ?  asset('assets/images/'.$instagram->photo) : asset('assets/images/placeholder.png') }}" alt="No photo found"></a>
                            @empty
                                <p>No photo yet</p>
                            @endforelse
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
                <!-- blog post content -->
                <div class="col-lg-8">
                    <!-- blog post -->
                    <div class="row">
                        <div class="col-12">
                            <div class="single-post">
                                <div class="single-post-img">
                                    <img src="{{ isset(json_decode($blog_info->photo,true)[0]) ?  asset('assets/images/'.json_decode($blog_info->photo,true)[0]) : asset('assets/images/placeholder.png')}}" alt="No photo found">
                                </div>
                                <div class="single-post-meta">
                                    <div class="post-author">
                                        <a href="#">By Admin</a>
                                    </div>
                                    <div class="post-date">
                                        {{ $blog_info->created_at->format("d M, Y") }}
                                    </div>
                                </div>
                                <h2 class="single-post-title">
                                    {{ $blog_info->title }}
                                </h2>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-post-img">
                                            <img src="{{ asset('frontendAsset') }}/assets/images/blog-post-22.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-post-img">
                                            <img src="{{ asset('frontendAsset') }}/assets/images/blog-post-23.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-content">
                                    {!! $blog_info->details !!}
                                </div>
                                <div class="single-post-share">
                                    <span class="social-share-text">Share:</span>
                                    <ul class="social-share-list">
                                        {!! $socialShares !!}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end blog post -->
                    <div class="pt-150">
                        <!-- review form section -->
                        <div class="row">
                            <div class="col-12">
                                <!-- main title -->
                                <div class="heading">
                                    <h2 class="main-heading">Leave a reply</h2>
                                </div>
                                <!-- end main title -->
                                <!-- review form -->
                                <div class="review-form">
                                    <form action="{{ route('comment.post') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $blog_info->id }}" name="blog_id" />
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 form-group">
                                                <label for="inputName">Name</label>
                                                <input type="text" class="form-control" id="inputName" name="name" required>
                                            </div>
                                            <div class="col-lg-4 col-md-12 form-group">
                                                <label for="inputEmail">Email</label>
                                                <input type="email" class="form-control" id="inputEmail" name="email" required>
                                            </div>
                                            <div class="col-lg-4 col-md-12 form-group">
                                                <label for="inputWeb">Website</label>
                                                <input type="text" class="form-control" id="inputWeb" name="website" required>
                                            </div>
                                            <div class="col-12 form-group">
                                                <textarea class="form-control" id="textarea" rows="7"
                                                    placeholder="Review" name="comment" required></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="button button--dark button-md">
                                                    Send
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- end review form -->
                            </div>
                        </div>
                        <!-- end review form section -->
                        <!-- review comments section -->
                        <div class="row">
                            <div class="col-12">
                                <div class="comments-list pt-60">
                                    <ul class="media-list">
                                        @forelse ($comments as $comment)
                                        <li class="media-item">
                                            <div class="media-item__body">
                                                <div class="user-avatar">
                                                    <img src="{{ asset('uploads/profile/default.png') }}" alt="">
                                                </div>
                                                <div class="media-inner">
                                                    <div class="header">
                                                        <div class="user-name">
                                                            <h6>{{ $comment->name }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <p>{{ $comment->comment }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @empty
                                            
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end review comments section -->
                    </div>
                </div>
                <!-- end blog post content -->
            </div>
        </div>
    </div>
    <!-- end main content section -->
@endsection