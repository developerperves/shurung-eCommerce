@extends('layouts.dashboardApp')
@section('title')
    Cutomer Order | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <h3>Orders</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="home"><i class="flaticon-home-fill"></i></a></li>
                    <li class="active"><a >Orders</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="row margin-bottom-120">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    @if (session('deleted_success'))
                    <div class="alert alert-danger">
                        {{ session('deleted_success') }}
                    </div>
                @endif
                    @if (session('is_active'))
                    <div class="alert text-success">
                        {{ session('is_active') }}
                    </div>
                @endif
                    <div class="table-responsive mb-4">
                        <table id="ecommerce-product-list" class="table  table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Transection ID</th>
                                    <th>User Name</th>
                                    <th>Payment Method</th>
                                    <th>Delivery Status</th>
                                    <th>Order Time </th>
                                    <th class="align-center">Action</th>
                                    <th>Mark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                <tr style="{{ $order->view == 1 ? 'background-color: #2b293d; opacity: .5;' : '' }}">
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $order->transaction_id }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>
                                        @if ($order->payment_type == 'cash_on_delivery')
                                        <span class="badge badge-info"> Cash On Delivery</span>
                                        @endif
                                        @if ($order->payment_type == 'ssl_commerz')
                                        <span class="badge badge-secondary">SSL Commerz</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{ $order->status != 'done' ? $order->status : 'Complete' }}</span>
                                    </td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a class="btn" href="{{ route('order.show', $order->id) }}"> View</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('order.done', $order->id) }}" method="POST">
                                            @csrf
                                            <button  type="submit" class="btn btn-primary" {{ $order->status != 'done' ? '' : 'disabled'}}>Done</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    
                                @endforelse
                                
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
    $('#ecommerce-product-list').DataTable({
        "lengthMenu": [ 5, 10, 20, 50, 100 ],
        "language": { "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
            "info": "Showing page _PAGE_ of _PAGES_"
        },
        drawCallback: function( settings ) { $('[data-toggle="tooltip"]').tooltip(); }
    });
</script>
@endsection
