@extends('layouts.frontendApp')
@section('title')
    Privacy & Policy | SHURUNG
@endsection
@section('frontendContent')
    
    <!-- page header image section -->
    <div class="page-header-img" style="background-color: grey;">
        <div class="container">
            <div class="page-header-img__wrapper">
                <h2 class="page-title">Privecy&Policy</h2>
            </div>
        </div>
    </div>
    <!-- end page header image section -->
    <!-- breadcrumb section -->
    <div class="custom-breadcrumb custom-breadcrumb--minimal">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('privecy.policy') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Privecy&Policy</li>
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
                    {!! setting()->privecy_policy !!}
                </div>
            </div>
        </div>
    </div>
    <!-- end main content section -->
@endsection