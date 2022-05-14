@extends('layouts.dashboardApp')
@section('title')
    Display Slider | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <h3>Display Slider</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="{{ route('home') }}"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="active"><a href="#">Display Slider</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="row margin-bottom-120">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Slider List</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    
			        @include('alerts.alerts')
                    <div class="table-responsive mb-4">
                        <table id="ecommerce-category-list" class="table  table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>
                                            <img style="width: 60px;" src="{{ $slider->photo ? asset('assets/images/'.$slider->photo) : asset('assets/images/placeholder.png') }}" alt="Image Not Found">
                                        </td>
                                        <td>
                                            <div class="action-list">
                                                <a class="btn btn-secondary btn-sm "
                                                    href="{{ route('slider.show',$slider->id) }}">
                                                    <i class="flaticon-edit"></i>
                                                </a>
                                                {{-- <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form> --}}
                                                <a class="btn btn-danger btn-sm " data-toggle="modal"
                                                data-target="#confirm-delete" href="javascript:;"
                                                data-href="">
                                                    <i class="flaticon-delete"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ __('Confirm Delete?') }}</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                {{ __('You are going to delete this category. All contents related with this category will be lost.') }} {{ __('Do you want to delete it?') }}
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                                                <form action="{{ route('slider.destroy',$slider->id) }}" class="d-inline btn-ok" method="POST">

                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>

                                                </form>
                                            </div>

                                        </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
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
                                        <form class="admin-form" action="{{ route('slider.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group position-relative">
                                            <label class="file">
                                                <input type="file"  accept="image/*"  class="upload-photo form-control" name="photo" id="file"
                                                    aria-label="File browser example" >
                                            </label>
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













{{-- DELETE MODAL --}}

{{-- <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

		<!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('Confirm Delete?') }}</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
		</div>

		<!-- Modal Body -->
        <div class="modal-body">
			{{ __('You are going to delete this category. All contents related with this category will be lost.') }} {{ __('Do you want to delete it?') }}
		</div>

		<!-- Modal footer -->
        <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
			<form action="" class="d-inline btn-ok" method="POST">

                @csrf

                @method('DELETE')

                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>

			</form>
		</div>

      </div>
    </div>
</div> --}}

{{-- DELETE MODAL ENDS --}}
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
