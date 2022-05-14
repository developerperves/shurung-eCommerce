@extends('layouts.dashboardApp')
@section('addetional_css')
<link href="{{ asset('dashboardAsset') }}/assets/css/ecommerce/addedit_categories.css" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Update Gallery | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
    <div class="container">
        <div class="page-header">
            <div class="page-title">
                <h3>Edit Categories</h3>
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li><a href="{{ route('home') }}"><i class="flaticon-home-fill"></i></a></li>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('product.index') }}">Product</a></li>
                        <li class="active"><a >{{ $product->name }}</a> </li>
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
                                <h4>Update Product </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area add-category">
                        <div class="row">
                            <div class="mx-xl-auto col-xl-10 col-md-12">
                                <div class="card card-default">
                                    <div class="card-heading"><h2 class="card-title"><span>Manage General Information</span></h2></div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            
                                            <form class="admin-form" action="{{ route('product.galleries.update') }}" method="POST"
                                            enctype="multipart/form-data">

                                            @csrf

                                            @include('alerts.alerts')

                                            <h5 class="">
                                                <b>{{ __('Multiple Images Uploading Are Allowed') }}</b>
                                            </h5>

                                            <br>

                                            <div class="d-block">
                                                

                                                @forelse($product->galleries as $gallery)
                                                <div class="single-g-item d-inline-block m-2">
                                                        <a href="{{ route('product.gallery.delete',$gallery->id) }}" class="remove-gallery-img">
                                                            <i class="flaticon-delete"></i>
                                                        </a>
                                                        <a class="popup-link" href="{{ $gallery->photo ? asset('assets/images/'.$gallery->photo) : asset('assets/images/placeholder.png') }}">
                                                            <img width="50px;" class="admin-gallery-img" src="{{ $gallery->photo ? asset('assets/images/'.$gallery->photo) : asset('assets/images/placeholder.png') }}"
                                                                alt="No Image Found">
                                                        </a>
                                                </div>
                                            @empty

                                                <h6><b>{{ __('No Images Added') }}</b></h6>

                                            @endforelse

                                            </div>

                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="form-group position-relative ">
                                                <label class="file">
                                                    <input type="file"  accept="image/*"  name="galleries[]" id="file"
                                                        aria-label="File browser example" accept="image/*" multiple>
                                                    <span class="file-custom text-left">{{ __('Upload Images...') }}</span>
                                                </label>
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