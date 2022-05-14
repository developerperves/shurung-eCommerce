@extends('layouts.frontendApp')
@section('title')
    Contact | SHURUNG
@endsection
@section('frontendContent')

    <!-- page header image section -->
    <div class="page-header-img">
        <!-- style="background-image: url('assets/images/map-bg.jpg')" -->
        <iframe
            src="{{ setting()->map }}"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    </div>
    <!-- end page header image section -->
     <!-- breadcrumb section -->
     <div class="custom-breadcrumb custom-breadcrumb--minimal">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- main content section -->
    <div class="main-content">
        <!-- contact us section -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-info-list list-divider">
                                <ul class="list-no-style">
                                    <li>
                                        <span class="info-title">Work hours:</span>
                                        <span class="info-content">{{ setting()->office_time_day }}: {{ setting()->office_time_hour }}</span>
                                    </li>
                                    <li>
                                        <span class="info-title">Email:</span>
                                        <span class="info-content">{{ setting()->email }}</span>
                                    </li>
                                    <li>
                                        <span class="info-title">Address:</span>
                                        <span class="info-content">{{ setting()->address }}</span>
                                    </li>
                                    <li>
                                        <span class="info-title">Phone:</span>
                                        <span class="info-content">{{ setting()->phone }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>{{ setting()->contact_detail_heading }}</h5>
                            <p>{{ setting()->contact_detail_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        @if (session('contact_success'))
                            <div class="alert alert-success">{{ session('contact_success') }}</div>
                        @endif
                        <form action="{{ route('contact.post') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-12 form-group">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" required>
                                </div>
                                <div class="col-lg-6 col-md-12 form-group">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
                                </div>
                                <div class="col-12 form-group">
                                    <textarea class="form-control" id="textarea" rows="7"
                                        placeholder="Message" name="comment" required></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="contact-form_btn">
                                        <button type="submit" class="button button--dark button-md">
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end contact us section -->
        <!-- social media section -->
        <!-- social media section -->
        @include('includes.instagram')
        <!-- end social media section -->
        <!-- end social media section -->
    </div>
    <!-- end main content section -->
@endsection