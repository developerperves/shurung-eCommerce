@extends('layouts.dashboardApp')
@section('title')
    Order Details | Dashboard
@endsection
@section('dashboardContent')
<div id="content" class="main-content">
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <h3>{{ $order->name }}'s details</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="home"><i class="flaticon-home-fill"></i></a></li>
                    <li class="active"><a href="{{ route('order.index') }}" >Orders</a></li>
                    <li class="active"><a > {{ $order->name }}'s Orders</a></li>
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
                        <h4>{{ $order->name }}'s Delivery details</h4>

                        <div class="delivery_details mt-5 mb-5">
                            <p> <strong>Transaction ID:</strong> {{ $order->transaction_id }}</p>
                            <p> <strong>Name:</strong> {{ $order->name }}</p>
                            <p> <strong>Email:</strong> {{ $order->email }}</p>
                            <p> <strong>Phone No:</strong> {{ $order->phone }}</p>
                            <p> <strong>District:</strong> {{ $order->cus_city }}</p>
                            <p> <strong>Address:</strong> {{ $order->address }}</p>
                            <p> <strong>Note:</strong> {{ $order->note }}</p>
                            <p> <strong>Delivery Status:</strong> {{ $order->status }}</p>
                            <p> <strong>Payment Method:</strong> {{ $order->payment_type == 'cash_on_delivery' ? 'Cash On Delivery' : 'SSL Commerz' }}</p>
                        </div>

                        <table id="ecommerce-product-list" class="table  table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Product Photo</th>
                                    <th>Product Quantity</th>
                                    <th>Price</th>
                                    <th>Sub total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        {{ $order->product->name }}
                                    </td>
                                    <td>
                                        <img style="width: 50px;" src="{{ asset('assets/images') }}/{{ $order->product->photo }}" alt="{{ $order->product->photo }}">
                                    </td>
                                    <td>
                                        {{ $order->product_quantity }}
                                    </td>
                                    <td>
                                        {{ $order->product_price }}
                                    </td>
                                    <td>
                                        {{ $order->product_quantity * $order->product_price }}
                                    </td>
                                    {{-- <td>{{ $order->name }}</td>
                                    <td>{{ $order->sub_total }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a class="btn" href="{{ route('order.show', $order->id) }}"> View Details </a>
                                    </td> --}}
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
