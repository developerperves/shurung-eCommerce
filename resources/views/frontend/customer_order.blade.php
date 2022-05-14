@extends('layouts.frontendApp')
@section('title')
    My Orders | SHURUNG
@endsection
@section('frontendContent')
    <!-- breadcrumb section -->
    <div class="custom-breadcrumb custom-breadcrumb--minimal">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Addresses</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- main content section -->
    <div class="main-content pb-150">
        <!-- dashboard section -->
        <div class="container">
            <div class="dashboard">
                <div class="row">
                    <!-- dashboard controls -->
                    <div class="col-lg-3 col-md-6 dashboard__control">
                        <ul class="list-no-style">
                            <li class="control_item">
                                <a href="{{ route('user.account') }}">
                                    <span><i class="icon-user"></i></span>My account</a>
                            </li>
                            {{-- <li class="control_item">
                                <a href="address.html">
                                    <span><i class="icon-list"></i></span>My address</a>
                            </li> --}}
                            <li class="control_item active">
                                <a href="{{ route('user.order') }}">
                                    <span><i class="icon-basket"></i></span>My orders</a></li>
                            {{-- <li class="control_item"><a href="change-pass.html">
                                    <span><i class="icon-lock"></i></span>Reset
                                    Password</a>
                            </li> --}}
                            <li class="control_item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" style="border: none; background: none;">
                                        <span><i class="icon-exit"></i></span>Log
                                        out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- end dashboard controls -->
                    <!-- dashboard information profile section -->
                    <div class="col-lg-9 dashboard__info">
                        <div class="panel panel-box panel-box-bg">
                            <div class="panel-heading">
                                <h3 class="panel-title">My Orders</h3>
                            </div>
                            <div class="order-table order-table__collapse">
                                <div class="order-table__head">
                                    <div class="order-table__row order-table__row--head">
                                        <div class="order-table__cell order-table__cell--id">Num.</div>
                                        <div class="order-table__cell order-table__cell--id">Tnx ID.</div>
                                        <div class="order-table__cell order-table__cell--date">Date</div>
                                        <div class="order-table__cell order-table__cell--price">Price</div>
                                        <div class="order-table__cell order-table__cell--receive">State</div>
                                        <div class="order-table__cell order-table__cell--details">Details</div>
                                    </div>
                                </div>
                                <div class="order-table__body">
                                    @forelse ($orders as $order)
                                    <div class="order-table__row">
                                        <div class="order-table__cell order-table__cell--id">
                                            <div class="order-table__cell--heading">Order number</div>
                                            <div class="order-table__cell--content id-content">
                                                {{ $loop->index+1 }}
                                            </div>
                                        </div>
                                        <div class="order-table__cell order-table__cell--id">
                                            <div class="order-table__cell--heading">Transaction ID.</div>
                                            <div class="order-table__cell--content id-content">
                                                {{ $order->transaction_id }}
                                            </div>
                                        </div>
                                        <div class="order-table__cell order-table__cell--date">
                                            <div class="order-table__cell--heading">Order Date</div>
                                            <div class="order-table__cell--content date-content">
                                                {{ $order->created_at->format('d/m/Y') }}
                                            </div>
                                        </div>
                                        <div class="order-table__cell order-table__cell--price">
                                            <div class="order-table__cell--heading">Total price</div>
                                            <div class="order-table__cell--content  price-content">{{ $order->amount }}</div>
                                        </div>
                                        <div class="order-table__cell order-table__cell--receive">
                                            <div class="order-table__cell--heading">Deliver State</div>
                                            <div class="order-table__cell--content receive-content">
                                                <span class="badge order-table__status order-table__status--progress">{{ $order->status }}</span>
                                            </div>
                                        </div>
                                        <div class="order-table__cell order-table__cell--details">
                                            <div class="order-table__cell--heading">Details</div>
                                            <div class="order-table__cell--content  details-content"><a
                                                    href="{{ route('user.order.detail', $order->transaction_id) }}">View
                                                    more</a></div>
                                        </div>
                                    </div>
                                    @empty
                                        
                                    @endforelse
                                </div>
                            </div>
                            <!-- empty account tab -->
                            <!--                        <div class="row">-->
                            <!--                            <div class="col-12">-->
                            <!--                                <div class="notice-wrapper">-->
                            <!--                                    <p>There is no item added here. <a href="shop-sidebar-right.html" class="notice-wrapper__link">GO Shop</a></p>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <!-- empty account tab -->
                        </div>
                    </div>
                </div>
                <!-- end dashboard information profile section -->
            </div>
        </div>
    </div>
    <!-- end dashboard section -->
    <!-- end main content section -->
@endsection