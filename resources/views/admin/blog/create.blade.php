@extends('layouts.dashboardApp')
@section('addetional_css')
<link href="{{ asset('dashboardAsset') }}/assets/css/ecommerce/addedit_categories.css" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Add Blog | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
    <div class="container">
        <div class="page-header">
            <div class="page-title">
                <h3>Add Blog</h3>
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li><a href="{{ route('home') }}"><i class="flaticon-home-fill"></i></a></li>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('blog.index') }}">Blogs</a></li>
                        <li class="active"><a >Add Blog</a> </li>
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
                                <h4>Add Blog</h4>
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
                                            <form class="admin-form" action="{{ route('blog.store') }}" method="POST"
                                            enctype="multipart/form-data">

                                            @csrf

                                            @include('alerts.alerts')

                                            <div class="form-group">
                                                <label for="name">{{ __('Set Image') }} *</label>
                                                <br>
                                                    <img class="admin-img" src="{{  asset('assets/images/placeholder.png') }}"
                                                        alt="No Image Found">
                                                <br>
                                                <span class="mt-1">{{ __('Image Size Should Be 320 x 325.') }}</span>
                                            </div>

                                            <div class="form-group position-relative ">
                                                <label class="file">
                                                    <input type="file"  accept="image/*"  class="upload-photo" name="photo[]" multiple id="file"
                                                        aria-label="File browser example" >
                                                    <span class="file-custom text-left">{{ __('Upload Image...') }}</span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">{{ __('Title') }} *</label>
                                                <input type="text" name="title" class="form-control" id="title"
                                                    placeholder="{{ __('Enter Title') }}" value="{{ old('title') }}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="category_id">{{ __('Select Category') }} *</label>
                                                <select name="category_id" id="category_id" class="form-control" >
                                                    <option value="" selected disabled>{{__('Select Category')}}</option>
                                                    @foreach(DB::table('blog_categories')->whereStatus(1)->get() as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="details">{{ __('Details') }} *</label>
                                                <textarea name="details" id="details" class="form-control text-editor" rows="5"
                                                    placeholder="{{ __('Enter Details') }}"
                                                    >{{ old('details') }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="tags">{{ __('Tags') }}
                                                    </label>
                                                <input type="text" name="tags" class="tags"
                                                    id="tags"
                                                    placeholder="{{ __('Tags') }}"
                                                    value="">
                                            </div>

                                            <div class="form-group">
                                                <label for="meta_keywords">{{ __('Meta Keywords') }}
                                                    </label>
                                                <input type="text" name="meta_keywords" class="tags"
                                                    id="meta_keywords"
                                                    placeholder="{{ __('Enter Meta Keywords') }}"
                                                    value="">
                                            </div>

                                            <div class="form-group">
                                                <label
                                                    for="meta_description">{{ __('Meta Description') }}
                                                    </label>
                                                <textarea name="meta_descriptions" id="meta_description"
                                                    class="form-control" rows="5"
                                                    placeholder="{{ __('Enter Meta Description') }}"
                                                ></textarea>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-secondary ">{{ __('Submit') }}</button>
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
    
<script type="text/javascript">
    $(document).ready(function(){
      ClassicEditor
        .create( document.querySelector( '#details' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
  
  
    })
  </script>
@endsection