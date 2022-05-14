@extends('layouts.dashboardApp')
@section('title')
    Latest Product List | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <h3>Banners</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="{{ route('home') }}"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="active"><a href="#">Latest Product</a></li>
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
                            <h4>Latest Product List  <a href="{{ route('latest.create') }}" class="btn btn-primary text-right" style="float: right;">add Latest</a></h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
			        @include('alerts.alerts')
                    <div class="table-responsive mb-4">
                        <table id="ecommerce-category-list" class="table  table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('Banner') }}</th>
                                    <th>{{ __('Heading') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <tr>
                                            <td>
                                                <img style="width: 50px;" src="{{ $data->thumbnail ? asset('assets/images/'.$data->thumbnail) : asset('assets/images/placeholder.png') }}" alt="Image Not Found">
                                            </td>
                                            <td>
                                                {{ $data->heading }}
                                            </td>
                                        <td>
                                            <div class="action-list">
                                                <a class="btn btn-secondary btn-sm "
                                                    href="{{ route('latest.edit',$data->id) }}">
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
                                                {{ __('You are going to delete this banner. All contents related with this category will be lost.') }} {{ __('Do you want to delete it?') }}
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                                                <form action="{{ route('latest.destroy',$data->id) }}" class="d-inline btn-ok" method="POST">
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
