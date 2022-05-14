@extends('layouts.dashboardApp')
@section('addetional_css')
<link href="{{ asset('dashboardAsset') }}/assets/css/ecommerce/addedit_categories.css" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Add Banner | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
    <div class="container">
        <div class="page-header">
            <div class="page-title">
                <h3>Add Banner</h3>
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li><a href="{{ route('home') }}"><i class="flaticon-home-fill"></i></a></li>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('banner.index') }}">Banners</a></li>
                        <li class="active"><a >Add Banner</a> </li>
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
                                <h4>Add Banner</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area add-category">
                        <div class="row">
                            <div class="mx-xl-auto col-xl-10 col-md-12">
                                <div class="card card-default">
                                    <div class="card-heading"><h2 class="card-title"><span>General Information</span></h2></div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <form class="admin-form" action="{{ route('banner.store') }}" method="POST"
                                            enctype="multipart/form-data">

                                            @csrf

                                            @include('alerts.alerts')

                                            <div class="form-group position-relative">
                                                <label class="file">
                                                    <input type="file"  accept="image/*"  class="upload-photo" name="photo" id="file"
                                                        aria-label="File browser example">
                                                </label>
                                                <br>
                                                <span class="mt-1">{{ __('Image Size Should Be 1920 x 535.') }}</span>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">{{ __('Heading One') }} *</label>
                                                <input type="text" name="heading_one" class="form-control item-name" id="name"
                                                    placeholder="{{ __('Enter Top Heading') }}" value="{{ old('heading_one') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="name">{{ __('Heading Two') }} *</label>
                                                <input type="text" name="heading_two" class="form-control item-name" id="name"
                                                    placeholder="{{ __('Enter Next Heading') }}" value="{{ old('heading_two') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="name">{{ __('Description') }} *</label>
                                                <textarea name="description" rows="4" class="form-control item-name" placeholder="{{ __('Enter Description') }}" >{{ old('description') }}</textarea>
                                            </div>

                                        <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-secondary ">{{ __('Submit') }}</button>
                                            </div>

                                            <div>
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
@section('footerScript')
    <script>
        
        // Tagify
        if( $('.tags').length > 0 ) {
            $('.tags').tagify();
        }
        
        $('.item-name').on('keyup',function(){

        let $this = $(this);

        let str = $this.val().replace(/[0-9`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi,'-').replace(/ /g, '-');

        $('#slug').val(str);

        });
    </script>
@endsection