@extends('layouts.dashboardApp')
@section('addetional_css')
<link href="{{ asset('dashboardAsset') }}/assets/css/ecommerce/addedit_categories.css" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Update Product | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
    <div class="container">
        <div class="page-header">
            <div class="page-title">
                <h3>Update Product</h3>
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
                                <h4>Update Product</h4>
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
                                            @include('alerts.alerts')
                                            <form class="admin-form" action="{{ route('product.update',$product->id) }}" method="POST"
                                                enctype="multipart/form-data">

                                                @csrf

                                                @method('PUT')
                                                <div class="row">

                                                    <div class="col-lg-8">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="name">{{ __('Name') }} *</label>
                                                                    <input type="text" name="name" class="form-control item-name"
                                                                        id="name"
                                                                        placeholder="{{ __('Enter Name') }}"
                                                                        value="{{ $product->name }}" >
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="slug">{{ __('Slug') }} *</label>
                                                                    <input type="text" name="slug" class="form-control"
                                                                        id="slug"
                                                                        placeholder="{{ __('Enter Slug') }}"
                                                                        value="{{ $product->slug }}" >
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group pb-0  mb-0">
                                                                    <label class="d-block">{{ __('Featured Image') }} *</label>
                                                                </div>
                                                                <div class="form-group pb-0 pt-0 mt-0 mb-0">
                                                                <img width="50px;" class="admin-img lg" src="{{ $product->photo ? asset('assets/images/'.$product->photo) : asset('assets/images/placeholder.png') }}" >
                                                                </div>
                                                                <div class="form-group position-relative ">
                                                                    <label class="file">
                                                                        <input type="file"  accept="image/*"   class="upload-photo" name="photo"
                                                                            id="file"  aria-label="File browser example">
                                                                        <span
                                                                            class="file-custom text-left">{{ __('Upload Image...') }}</span>
                                                                    </label>
                                                                    <br>
                                                                    <span class="mt-1 text-info">{{ __('Image Size Should Be 255 x 390. or square size') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group pb-0  mb-0">
                                                                    <label>{{ __('Gallery Images') }} </label>
                                                                </div>
                                                                <div class="form-group pb-0 pt-0 mt-0 mb-0">
                                                                    <div id="gallery-images">
                                                                        <div class="d-block">

                                                                            @forelse($product->galleries as $gallery)
                                                                                <div class="single-g-item d-inline-block m-2">
                                                                                        <a  href="{{ route('product.gallery.delete', $gallery->id) }}"
                                                                                        data-href="" class="remove-gallery-img">
                                                                                            <i class="fas fa-trash"></i>
                                                                                        </a>
                                                                                        <a class="popup-link" href="{{ $gallery->photo ? asset('assets/images/'.$gallery->photo) : asset('assets/images/placeholder.png') }}">
                                                                                            <img style="width: 70px;" class="admin-gallery-img" src="{{ $gallery->photo ? asset('assets/images/'.$gallery->photo) : asset('assets/images/placeholder.png') }}"
                                                                                                alt="No Image Found">
                                                                                        </a>
                                                                                </div>
                                                                            @empty
                                                                                <h6><b>{{ __('No Images Added') }}</b></h6>
                                                                            @endforelse
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group position-relative ">
                                                                    <label class="file">
                                                                        <input type="file"  accept="image/*"  name="galleries[]" id="file"
                                                                                aria-label="File browser example" accept="image/*" multiple>
                                                                        <span
                                                                            class="file-custom text-left">{{ __('Upload Image...') }}</span>
                                                                    </label>
                                                                    <br>
                                                                    <span class="mt-1 text-info">{{ __('Image Size Should Be 255 x 390. or square size') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="sort_details">{{ __('Short Description') }} *</label>
                                                                    <textarea name="sort_details" id="sort_details"
                                                                        class="form-control"
                                                                        placeholder="{{ __('Short Description') }}"
                                                                        >{{$product->sort_details}}</textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="details">{{ __('Description') }} *</label>
                                                                    <textarea name="details" id="details"
                                                                        class="form-control text-editor"
                                                                        rows="6"
                                                                        placeholder="{{ __('Enter Description') }}"
                                                                        >{{$product->details}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="tags">{{ __('Product Tags') }}
                                                                        </label>
                                                                    <input type="text" name="tags" class="tags"
                                                                        id="tags"
                                                                        placeholder="{{ __('Tags') }}"
                                                                        value="{{$product->tags}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="switch-primary">
                                                                        <input type="checkbox" class="switch switch-bootstrap status radio-check" name="is_specification" value="1" {{$product->is_specification ==1 ? 'checked' : ''}}>
                                                                        <span class="switch-body"></span>
                                                                        <span class="switch-text">{{ __('Specifications') }}</span>
                                                                    </label>
                                                                </div>

                                                                <div id="specifications-section" class="{{ $product->is_specification == 0 ? 'd-none' : '' }}">
                                                                    @if(!empty($specification_name))
                                                                    @foreach(array_combine($specification_name,$specification_description) as  $name => $description)
                                                                    <div class="d-flex">
                                                                        <div class="flex-grow-1">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="specification_name[]"
                                                                                    placeholder="{{ __('Specification Name') }}" value="{{$name}}">
                                                                                </div>
                                                                        </div>
                                                                        <div class="flex-grow-1">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="specification_description[]"
                                                                                    placeholder="{{ __('Specification description') }}" value="{{$description}}">
                                                                                </div>
                                                                        </div>
                                                                        <div class="flex-btn">
                                                                            @if($loop->first)
                                                                            <button type="button" class="btn btn-success add-specification" data-text="{{ __('Specification Name') }}" data-text1="{{ __('Specification Description') }}"> <i class="flaticon-circle-plus"></i> </button>
                                                                            @else
                                                                            <button type="button" class="btn btn-danger remove-spcification" data-text="{{ __('Specification Name') }}" data-text1="{{ __('Specification Description') }}"> <i class="flaticon-circle-cross"></i> </button>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    @endforeach
                                                                    @else
                                                                    <div class="d-flex">
                                                                        <div class="flex-grow-1">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="specification_name[]"
                                                                                    placeholder="{{ __('Specification Name') }}" value="">
                                                                                </div>
                                                                        </div>
                                                                        <div class="flex-grow-1">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="specification_description[]"
                                                                                    placeholder="{{ __('Specification description') }}" value="">
                                                                                </div>
                                                                        </div>
                                                                        <div class="flex-btn">
                                                                            <button type="button" class="btn btn-success add-specification" data-text="{{ __('Specification Name') }}" data-text1="{{ __('Specification Description') }}"> <i class="fa fa-plus"></i> </button>
                                                                        </div>
                                                                    </div>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="meta_keywords">{{ __('Meta Keywords') }}
                                                                        </label>
                                                                    <input type="text" name="meta_keywords" class="tags"
                                                                        id="meta_keywords"
                                                                        placeholder="{{ __('Enter Meta Keywords') }}"
                                                                        value="{{ $product->meta_keywords }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        for="meta_description">{{ __('Meta Description') }}
                                                                        </label>
                                                                    <textarea name="meta_description" id="meta_description"
                                                                        class="form-control" rows="5"
                                                                        placeholder="{{ __('Enter Meta Description') }}">{{ $product->meta_description }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                {{-- <input type="hidden" class="check_button" name="is_button" value="0"> --}}
                                                                <button type="submit" class="btn btn-secondary mr-2">{{ __('Update') }}</button>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="discount_price">{{ __('Current Price') }}
                                                                        *</label>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span
                                                                                class="input-group-text">৳</span>
                                                                        </div>
                                                                        <input type="text" id="discount_price"
                                                                            name="discount_price" class="form-control"
                                                                            placeholder="{{ __('Enter Current Price') }}"
                                                                            min="1" step="0.1"
                                                                            value="{{ round($product->discount_price) }}" >
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="previous_price">{{ __('Previous Price') }}
                                                                        </label>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span
                                                                                class="input-group-text">৳</span>
                                                                        </div>
                                                                        <input type="text" id="previous_price"
                                                                            name="previous_price" class="form-control"
                                                                            placeholder="{{ __('Enter Previous Price') }}"
                                                                            min="1" step="0.1"
                                                                            value="{{ round($product->previous_price)}}" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                
                                                            <div class="form-group">
                                                                <label for="category_id">{{ __('Select Category') }} *</label>
                                                                <select name="category_id" id="category_id" data-href="{{route('admin.get.subcategory')}}" class="form-control" >
                                                                    @foreach(DB::table('categories')->whereStatus(1)->get() as $cat)
                                                                    <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="subcategory_id">{{ __('Select Sub Category') }} </label>
                                                                <select name="subcategory_id" id="subcategory_id" class="form-control" >
                                                                    <option value="">{{__('Select one')}}</option>
                                                                    @foreach(DB::table('subcategories')->where('category_id',$product->category_id)->whereStatus(1)->get() as $subcat)
                                                                    <option value="{{ $subcat->id }}" {{ $subcat->id == $product->subcategory_id ? 'selected' : '' }}>{{ $subcat->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                                <div class="form-group">
                                                                    <label for="brand_id">{{ __('Select Brand') }} </label>
                                                                    <select name="brand_id" id="brand_id" class="form-control" >
                                                                        <option value="" selected>{{__('Select Brand')}}</option>
                                                                        @foreach(DB::table('brands')->whereStatus(1)->get() as $brand)
                                                                        <option value="{{ $brand->id }}" {{$brand->id == $product->brand_id ? 'selected' : ''}} >{{ $brand->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="stock">{{ __('Total in stock') }}
                                                                        *</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="number" id="stock"
                                                                            name="stock" class="form-control"
                                                                            placeholder="{{ __('Total in stock') }}" value="{{$product->stock}}" >
                                                                    </div>
                                                                </div>
                                                            </div>
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

@section('footerScript')
    <script>
        
$('#category_id').change(function(){

var category_id = $(this).val();
// ajax setup
$.ajaxSetup({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
}) ;
// ajax resource start
$.ajax({
     type : 'POST',
     url : '/get/item/subcategory',
     data : {category_id:category_id},
     success : function (data){
        $('#subcategory_id').html(data);
        // $('#city_list_2').html(data);
     }
}) ;
// ajax resource end
});
        // Tagify
        if( $('.tags').length > 0 ) {
            $('.tags').tagify();
        }
        
        $('.item-name').on('keyup',function(){

        let $this = $(this);

        let str = $this.val().replace(/[0-9`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi,'-').replace(/ /g, '-');

        $('#slug').val(str);

        });



        
        // Appending Specification To Items
        $('.add-specification').on('click',function(){
            var text = $(this).data('text');
            var text1 = $(this).data('text1');
            $('#specifications-section').append(`
            <div class="d-flex">
            <div class="flex-grow-1">
            <div class="form-group">
                <input type="text" class="form-control"
                    name="specification_name[]"
                    placeholder="${text}" value="">
                </div>
        </div>
        <div class="flex-grow-1">
            <div class="form-group">
                <input type="text" class="form-control"
                    name="specification_description[]"
                    placeholder="${text1}" value="">
                </div>
        </div>
        <div class="flex-btn">
                    <button type="button" class="btn  remove-spcification">
                        <i class="flaticon-circle-cross"></i>
                    </button>
                </div>
        </div>
            `);

            $('.social-picker').iconpicker();

        });
        $(document).on('click','.remove-spcification',function(){
            $(this).parent().parent().remove();
        });
    </script>
@endsection