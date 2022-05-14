@extends('layouts.dashboardApp')
@section('title')
    Subcategory List | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <h3>Subcategories</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href=""><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="active"><a href="#">Subcatgories</a></li>
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
                            <h4>Subcategory List  <a href="{{ route('admin.subcategory.create') }}" class="btn btn-primary text-right" style="float: right;">add subcategory</a></h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    
			        @include('alerts.alerts')
                    <div class="table-responsive mb-4">
                        <table id="ecommerce-category-list" class="table  table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('Category') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td>
                                            {{$data->category->name}}
                                        </td>
                                        <td>
                                            {{ $data->name }}
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-{{  $data->status == 1 ? 'success' : 'danger'  }} btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{  $data->status == 1 ? __('Enabled') : __('Disabled')  }}
                                                </button>
                                                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('admin.subcategory.status',[$data->id,1]) }}">{{ __('Enable') }}</a>
                                                <a class="dropdown-item" href="{{ route('admin.subcategory.status',[$data->id,0]) }}">{{ __('Disable') }}</a>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="action-list">
                                                <a class="btn btn-secondary btn-sm "
                                                    href="{{ route('admin.subcategory.edit',$data->id) }}">
                                                    <i class="flaticon-edit"></i>
                                                </a>
                                                
                                                <form action="{{ route('admin.subcategory.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="flaticon-delete"></i>
                                                </button>
                                                </form>

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
                                                <form action="{{ route('admin.subcategory.destroy',$data->id) }}" class="d-inline btn-ok" method="POST">

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
