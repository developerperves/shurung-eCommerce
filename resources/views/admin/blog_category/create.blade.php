@extends('layouts.dashboardApp')
@section('addetional_css')
<link href="{{ asset('dashboardAsset') }}/assets/css/ecommerce/addedit_categories.css" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Add Blog Category | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
    <div class="container">
        <div class="page-header">
            <div class="page-title">
                <h3>Add Blog Category</h3>
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li><a href="{{ route('home') }}"><i class="flaticon-home-fill"></i></a></li>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('bcategory.index') }}">Blog Category</a></li>
                        <li class="active"><a >Add Blog Category</a> </li>
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
                                <h4>Add Blog Category</h4>
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
                                            
                                            <form class="admin-form" action="{{ route('bcategory.store') }}" method="POST"
                                            enctype="multipart/form-data">

                                                @csrf

                                                @include('alerts.alerts')

                                                <div class="form-group">
                                                    <label for="name">{{ __('Name') }} *</label>
                                                    <input type="text" name="name" class="form-control item-name" id="name"
                                                        placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="slug">{{ __('Slug') }} *</label>
                                                    <input type="text" name="slug" class="form-control" id="slug"
                                                        placeholder="{{ __('Enter Slug') }}" value="{{ old('slug') }}" >
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