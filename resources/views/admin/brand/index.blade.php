@extends('layouts.dashboardApp')
@section('title')
    Brand List | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <h3>Brands</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="{{ route('home') }}"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="active"><a href="#">Brands</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="row margin-bottom-120">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Brand List  <a href="{{ route('brand.create') }}" class="btn btn-primary text-right" style="float: right;">add brand</a></h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    
			        @include('alerts.alerts')
                    <div class="table-responsive mb-4">
                        <table id="ecommerce-category-list" class="table  table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Logo') }}</th>
                                    <th>{{ __('Slug') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Popular') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <tr>
                                            <td>
                                                {{ $data->name }}
                                            </td>
                                            <td>
                                                <img style="width: 50px;" src="{{ $data->photo ? asset('assets/images/'.$data->photo) : asset('assets/images/placeholder.png') }}" alt="Image Not Found">
                                            </td>
                                            <td>
                                                {{ $data->slug }}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-{{  $data->status == 1 ? 'success' : 'danger'  }} btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      {{  $data->status == 1 ? __('Enabled') : __('Disabled')  }}
                                                    </button>
                                                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                      <a class="dropdown-item" href="{{ route('brand.status',[$data->id,1,'status']) }}">{{ __('Enable') }}</a>
                                                      <a class="dropdown-item" href="{{ route('brand.status',[$data->id,0,'status']) }}">{{ __('Disable') }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-{{  $data->is_popular == 1 ? 'success' : 'danger'  }} btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      {{  $data->is_popular == 1 ? __('Enabled') : __('Disabled')  }}
                                                    </button>
                                                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                      <a class="dropdown-item" href="{{ route('brand.status',[$data->id,1,'is_popular']) }}">{{ __('Enable') }}</a>
                                                      <a class="dropdown-item" href="{{ route('brand.status',[$data->id,0,'is_popular']) }}">{{ __('Disable') }}</a>
                                                    </div>
                                                </div>
                                        
                                            </td>
                                        <td>
                                            <div class="action-list">
                                                <a class="btn btn-secondary btn-sm "
                                                    href="{{ route('brand.edit',$data->id) }}">
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
                                                <form action="{{ route('brand.destroy',$data->id) }}" class="d-inline btn-ok" method="POST">

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
