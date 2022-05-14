@extends('layouts.dashboardApp')
@section('addetional_css')
<link href="{{ asset('dashboardAsset') }}/assets/css/ecommerce/addedit_categories.css" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Update Category | Dashboard
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
                        <li><a href="{{ route('category.index') }}">Categories</a></li>
                        <li class="active"><a >{{ $category->name }}</a> </li>
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
                                <h4>Edit Category </h4>
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
                                            @if (session('updated_success'))
                                                <div class="alert alert-success">
                                                    {{ session('updated_success') }}
                                                </div>
                                            @endif
                                            @if ($errors->all())
                                             <div class="alert alert-danger">
                                                 @foreach ($errors->all() as $error)
                                                     <li>{{ $error }}</li>
                                                 @endforeach
                                             </div>
                                              @endif
                                              
								<form class="admin-form" action="{{ route('category.update',$category->id) }}"
									method="POST" enctype="multipart/form-data">

                                    @csrf

                                    @method('PUT')

									@include('alerts.alerts')

									<div class="form-group">
										<label for="name">{{ __('Current Image') }} *</label>
										<br>
											<img style="width: 60px;" class="admin-img"
												src="{{ $category->photo ? asset('assets/images/'.$category->photo) : asset('assets/images/placeholder.png') }}"
												alt="No Image Found">
                                        <br>
										<span class="mt-1">{{ __('Image Size Should Be 200 x 200.') }}</span>
									</div>

									<div class="form-group position-relative">
										<label class="file">
											<input type="file"  accept="image/*"  class="upload-photo" name="photo" id="file"
												aria-label="File browser example">
											<span class="file-custom text-left">{{ __('Upload Image...') }}</span>
										</label>
                                    </div>

									<div class="form-group">
										<label for="name">{{ __('Name') }} *</label>
										<input type="text" name="name" class="form-control item-name" id="name"
											placeholder="{{ __('Enter Name') }}" value="{{ $category->name }}" >
									</div>

									<div class="form-group">
										<label for="slug">{{ __('Slug') }} *</label>
										<input type="text" name="slug" class="form-control" id="slug"
											placeholder="{{ __('Enter Slug') }}" value="{{ $category->slug }}" >
									</div>

									<div class="form-group">
										<label for="meta_keywords">{{ __('Meta Keywords') }}
											</label>
										<input type="text" name="meta_keywords" class="tags"
											id="meta_keywords"
											placeholder="{{ __('Enter Meta Keywords') }}"
											value="{{$category->meta_keywords}}">
									</div>

									<div class="form-group">
										<label
											for="meta_description">{{ __('Meta Description') }}
											</label>
										<textarea name="meta_descriptions" id="meta_descriptions"
											class="form-control" rows="5"
											placeholder="{{ __('Enter Meta Description') }}"
										>{{$category->meta_descriptions}}</textarea>
									</div>

									<div class="form-group">
										<label for="serial">{{ __('Serial') }} </label>
										<input type="number" name="serial" class="form-control" id="serial"
											placeholder="{{ __('Enter Serial Number') }}" value="{{ $category->serial }}">
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