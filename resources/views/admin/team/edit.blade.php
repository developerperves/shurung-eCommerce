@extends('layouts.dashboardApp')
@section('addetional_css')
<link href="{{ asset('dashboardAsset') }}/assets/css/ecommerce/addedit_categories.css" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Update Team Member | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
    <div class="container">
        <div class="page-header">
            <div class="page-title">
                <h3>Update Team Member</h3>
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li><a href="{{ route('home') }}"><i class="flaticon-home-fill"></i></a></li>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('team.index') }}">Teams</a></li>
                        <li class="active"><a >{{ $team->name }}</a> </li>
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
                                <h4>Update Team Member</h4>
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
                                            <form class="admin-form" action="{{ route('team.update', $team->id) }}" method="POST"
                                            enctype="multipart/form-data">

                                            @csrf
                                            @method("PUT")

                                            @include('alerts.alerts')
                                            

                                            <div class="form-group">
                                                <label for="name">{{ __('Current Image') }} *</label>
                                                <br>
                                                    <img width="110px;" class="admin-img"
                                                        src="{{ $team->photo ? asset('assets/images/'.$team->photo) : asset('assets/images/placeholder.png') }}"
                                                        alt="No Image Found">
                                                        <br>
                                                        <span class="mt-1">{{ __('Image Size Should Be 280 x 345.') }}</span>
                                            </div>

                                            <div class="form-group position-relative">
                                                <label class="file">
                                                    <input type="file"  accept="image/*"  class="upload-photo" name="photo" id="file"
                                                        aria-label="File browser example">
                                                </label>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">{{ __('Name') }} *</label>
                                                <input type="text" name="name" class="form-control item-name" id="name" value="{{ $team->name }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">{{ __('Designation') }} *</label>
                                                <input type="text" name="designation" class="form-control" id="designation" value="{{ $team->designation }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="facebook_link">{{ __('Facebook link (Optional)') }} *</label>
                                                <input type="text" name="facebook_link" class="form-control" id="facebook_link" value="{{ $team->facebook_link }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="instagram_link">{{ __('Instagram link (Optional)') }} *</label>
                                                <input type="text" name="instagram_link" class="form-control" id="instagram_link" value="{{ $team->instagram_link }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="twitter_link">{{ __('Twitter link (Optional)') }} *</label>
                                                <input type="text" name="twitter_link" class="form-control" id="twitter_link" value="{{ $team->twitter_link }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="linkedin_link">{{ __('Linked In link (Optional)') }} *</label>
                                                <input type="text" name="linkedin_link" class="form-control" id="linkedin_link" value="{{ $team->linkedin_link }}">
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