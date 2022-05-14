@extends('layouts.dashboardApp')
@section('title')
    Update Display Slider | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <h3>Update Display Slider</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="{{ route('home') }}"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="{{ route('home') }}">Dashboard</a></li>
                    <li><a href="{{ route('slider.index') }}">Display Slider</a></li>
                    <li class="active"><a href="#">Update Display Slider</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="row margin-bottom-120">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 m-auto">
            <div class="statbox widget box box-shadow">
                {{-- <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Add Slider </h4>
                        </div>
                    </div>
                </div> --}}
                <div class="widget-content widget-content-area add-category">
                    <div class="row">
                        <div class="mx-xl-auto col-xl-10 col-md-12">
                            <div class="card card-default">
                                    <div class="card-body">                      
                                        <form class="admin-form" action="{{ route('slider.update', $slider->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group position-relative">
                                            <label class="file">
                                                <input type="file"  accept="image/*"  class="upload-photo form-control" name="photo" id="file"
                                                    aria-label="File browser example" >
                                            </label>
                                            <img style="width: 60px;" src="{{ $slider->photo ? asset('assets/images/'.$slider->photo) : asset('assets/images/placeholder.png') }}" alt="Image Not Found">
                                            <br>
                                            <span class="mt-1">{{ __('Image Size Should Be 370 x 370.') }}</span>
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
@endsection

@section('footerScript')
<script src="{{ asset('dashboardAsset') }}/plugins/table/datatable/datatables.js"></script>
<script>
    $('#ecommerce-category-list').DataTable({
        "lengthMenu": [ 5, 10, 20, 50, 100 ],
        "language": { "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
            "info": "Showing page _PAGE_ of _PAGES_"
        },
        drawCallback: function( settings ) { $('[data-toggle="tooltip"]').tooltip(); }
    });
</script>
@endsection
