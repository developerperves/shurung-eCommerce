@extends('layouts.dashboardApp')
@section('addetional_css')
<link href="{{ asset('dashboardAsset') }}/assets/css/ecommerce/addedit_categories.css" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Add Instagram | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
    <div class="container">
        <div class="page-header">
            <div class="page-title">
                <h3>Add Instagram</h3>
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('instagram.index') }}">Instagram</a></li>
                        <li class="active"><a >Add Instagram</a> </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Add Instagram </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area add-category">
                        <div class="row">
                            <div class="mx-xl-auto col-xl-10 col-md-12">
                                @include('alerts.alerts')
                                <div class="card card-default">
                                    <div class="card-heading"><h2 class="card-title"><span>General Information</span></h2></div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            
                                        <form class="admin-form tab-form" action="{{ route('instagram.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        {{-- <input type="hidden" value="normal" name="item_type"> --}}
                                        @csrf
                                        <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="Photo">{{ __('Photo') }} *</label>
                                                <input type="file" class="form-control" name="photo">
                                                <br>
                                                <span class="mt-1">{{ __('Image Size Should Be 190 x 205.') }}</span>
                                            </div>

                                            <div class="form-group">
                                                <label for="link">{{ __('Link') }} *</label>
                                                <textarea name="link" id="link"
                                                    class="form-control"
                                                    rows="4"
                                                    placeholder="{{ __('Enter Link') }}"
                                                    >{{ old('link') }}</textarea>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit"
                                                    class="btn btn-secondary ">{{ __('Submit') }}</button>
                                                <a href="{{ route('instagram.index') }}" class="btn btn-info ">{{ __('Cancel') }}</a>
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
            </div>
        </div>
    </div>
</div>
@endsection