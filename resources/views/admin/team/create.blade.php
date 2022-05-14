@extends('layouts.dashboardApp')
@section('addetional_css')
<link href="{{ asset('dashboardAsset') }}/assets/css/ecommerce/addedit_categories.css" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Add Team Member | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
    <div class="container">
        <div class="page-header">
            <div class="page-title">
                <h3>Add Team Member</h3>
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li><a href="{{ route('home') }}"><i class="flaticon-home-fill"></i></a></li>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('team.index') }}">Teams</a></li>
                        <li class="active"><a >Add Team Member</a> </li>
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
                                <h4>Add Team Member</h4>
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
                                            <form class="admin-form" action="{{ route('team.store') }}" method="POST"
                                            enctype="multipart/form-data">

                                            @csrf

                                            @include('alerts.alerts')

                                            <div class="form-group position-relative">
                                                <label class="file">
                                                    <input type="file"  accept="image/*"  class="upload-photo" name="photo" id="file"
                                                        aria-label="File browser example">
                                                </label>
                                                <br>
                                                <span class="mt-1">{{ __('Image Size Should Be 280 x 345.') }}</span>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">{{ __('Name') }} *</label>
                                                <input type="text" name="name" class="form-control item-name" id="name"
                                                    placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">{{ __('Designation') }} *</label>
                                                <input type="text" name="designation" class="form-control" id="designation"
                                                    placeholder="{{ __('Enter Designation') }}" value="{{ old('designation') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="facebook_link">{{ __('Facebook link (Optional)') }} *</label>
                                                <input type="text" name="facebook_link" class="form-control" id="designation"
                                                    placeholder="{{ __('Enter link') }}" value="{{ old('facebook_link') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="instagram_link">{{ __('Instagram link (Optional)') }} *</label>
                                                <input type="text" name="instagram_link" class="form-control" id="instagram_link"
                                                    placeholder="{{ __('Enter link') }}" value="{{ old('instagram_link') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="twitter_link">{{ __('Twitter link (Optional)') }} *</label>
                                                <input type="text" name="twitter_link" class="form-control" id="twitter_link"
                                                    placeholder="{{ __('Enter link') }}" value="{{ old('twitter_link') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="linkedin_link">{{ __('Linked In link (Optional)') }} *</label>
                                                <input type="text" name="linkedin_link" class="form-control" id="linkedin_link"
                                                    placeholder="{{ __('Enter link') }}" value="{{ old('linkedin_link') }}">
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