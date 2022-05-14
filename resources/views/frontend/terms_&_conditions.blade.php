@extends('layouts.frontendApp')
@section('title')
    Terms & Conditions | SHURUNG
@endsection
@section('frontendContent')
    
    <!-- page header image section -->
    <div class="page-header-img" style="background-color: grey;">
        <div class="container">
            <div class="page-header-img__wrapper">
                <h2 class="page-title"> Terms & Conditions</h2>
            </div>
        </div>
    </div>
    <!-- end page header image section -->
    <!-- breadcrumb section -->
    <div class="custom-breadcrumb custom-breadcrumb--minimal">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- main content section -->
    <div class="main-content pb-150">
        <div class="container">
            <!-- end faq tools-->
            <div class="row">
                <div class="col-12">
                    {!! setting()->terms_conditions !!}
                </div>
                <!-- end faq text -->
            </div>
        </div>
    </div>
    <!-- end main content section -->
@endsection