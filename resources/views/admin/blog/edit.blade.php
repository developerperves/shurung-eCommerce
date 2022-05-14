@extends('layouts.dashboardApp')
@section('addetional_css')
<link href="{{ asset('dashboardAsset') }}/assets/css/ecommerce/addedit_categories.css" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Update Blog | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
    <div class="container">
        <div class="page-header">
            <div class="page-title">
                <h3>Update Blog</h3>
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li><a href="{{ route('home') }}"><i class="flaticon-home-fill"></i></a></li>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                        <li class="active"><a >{{ $blog->name }}</a> </li>
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
                                <h4>Update Blog</h4>
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
                                            <form class="admin-form" action="{{ route('blog.update',$blog->id) }}"
                                                method="POST" enctype="multipart/form-data">

                                                @csrf

                                                @method('PUT')

                                                @include('alerts.alerts')

                                                <h5 class="">
                                                    <b>{{ __('Multiple Images Uploading Are Allowed') }}</b>
                                                </h5>

                                                <br>

                                                <div class="d-block">

                                                    @forelse(json_decode($blog->photo,true) as $key => $photo)
                                                        <div class="single-g-item d-inline-block m-2">
                                                                <a href="{{ route('blog.photo.delete',[$key,$blog->id]) }}" class="remove-gallery-img">
                                                                    <i class="flaticon-delete"></i>
                                                                </a>
                                                                <a class="popup-link" href="{{ $photo ? asset('assets/images/'.$photo) : asset('assets/images/placeholder.png') }}">
                                                                    <img width="80px;" class="admin-gallery-img" src="{{ $photo ? asset('assets/images/'.$photo) : asset('assets/images/placeholder.png') }}"
                                                                        alt="No Image Found">
                                                                </a>
                                                        </div>
                                                    @empty

                                                        <h6><b>{{ __('No Images Added') }}</b></h6>

                                                    @endforelse

                                                </div>


                                                <div class="form-group position-relative ">
                                                    <label class="file">
                                                        <input type="file"  accept="image/*"  name="photo[]" id="file"
                                                            aria-label="File browser example" accept="image/*" multiple>
                                                            <br>
                                                            <span class="mt-1">{{ __('Image Size Should Be 320 x 325.') }}</span>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">{{ __('Title') }} *</label>
                                                    <input type="text" name="title" class="form-control" id="title"
                                                        placeholder="{{ __('Enter Title') }}" value="{{ $blog->title }}" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="category_id">{{ __('Select Category') }} *</label>
                                                    <select name="category_id" id="category_id" class="form-control" >
                                                        <option value="" selected disabled>{{__('Select Category')}}</option>
                                                        @foreach(DB::table('blog_categories')->whereStatus(1)->get() as $category)
                                                        <option value="{{ $category->id }}" {{$blog->category_id == $category->id ? 'selected' : ''}} >{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="details">{{ __('Details') }} *</label>
                                                    <textarea name="details" id="details" class="form-control text-editor" rows="5"
                                                        placeholder="{{ __('Enter Details') }}"
                                                        >{{ $blog->details }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tags">{{ __('Tags') }}
                                                        </label>
                                                    <input type="text" name="tags" class="tags"
                                                        id="tags"
                                                        placeholder="{{ __('Tags') }}"
                                                        value="{{$blog->tags}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_keywords">{{ __('Meta Keywords') }}
                                                        </label>
                                                    <input type="text" name="meta_keywords" class="tags"
                                                        id="meta_keywords"
                                                        placeholder="{{ __('Enter Meta Keywords') }}"
                                                        value="{{$blog->meta_keywords}}">
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        for="meta_description">{{ __('Meta Description') }}
                                                        </label>
                                                    <textarea name="meta_descriptions" id="meta_descriptions"
                                                        class="form-control" rows="5"
                                                        placeholder="{{ __('Enter Meta Description') }}"
                                                    >{{$blog->meta_descriptions}}</textarea>
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