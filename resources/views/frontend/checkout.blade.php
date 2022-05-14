@extends('layouts.frontendApp')
@section('title')
    Checkout | SHURUNG
@endsection
@section('frontendContent')
    
<!-- breadcrumb section -->
<div class="custom-breadcrumb custom-breadcrumb--minimal">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
</div>
<!-- end breadcrumb section -->
<!-- main content section -->
<div class="main-content pb-150">
    <!-- cart section -->
    <div class="container">
        <div class="checkout-section">
            <!-- cart form -->
            <form action="{{ route('ssl.payment') }}" method="post">
                @csrf
                <!-- main title -->
                <div class="heading">
                    <h3 class="main-heading">Billing Details</h3>
                    @if ($errors->any())
              <div class="col-lg-12">
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                     
                    </div>
                  </div>
                @endif
                </div>
                <!-- end main title -->
                <!-- checkout form -->
                <div class="billing-fields custom-form">
                    <div class="row">
                        <div class="col-lg-8">
                            
                               
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-wrapper form-group">
                                                <input type="text" class="form-control" id="nameInput"
                                                       placeholder="Customer Name" name="cus_name" value="{{ Auth::user()->name }}">
                                                <label class="form-control-label">Customer Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-wrapper form-group">
                                                <input type="text" class="form-control" id="emailInput"
                                                       placeholder="Email" name="cus_email" value="{{ Auth::user()->email }}">
                                                <label class="form-control-label">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-wrapper form-group">
                                                <input type="text" class="form-control" id="phoneInput"
                                                       placeholder="Phone" name="cus_phone">
                                                <label class="form-control-label">Phone</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-wrapper form-group">
                                                <input type="text" class="form-control" id="emailInput"
                                                       placeholder="Country" name="cus_country" value="Bangladesh">
                                                <label class="form-control-label">Country</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label class="form-control-label">City</label>
                                            <div class="input-wrapper form-group">
                                                <select name="cus_city" id="">
                                                    <option value="">Choose your city..</option>
                                                    @foreach ($districts as $district)
                                                    <option value="{{ $district->name }}">{{ $district->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="input-wrapper form-group">
                                                <input type="text" class="form-control" name="cus_postcode" id="addressInput"
                                                       placeholder="Post Code">
                                                <label class="form-control-label">Post Code</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-9">
                                            <div class="input-wrapper form-group">
                                                <input type="text" class="form-control" name="cus_address" id="addressInput"
                                                       placeholder="Address">
                                                <label class="form-control-label">Address</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="heading">
                                        <h3 class="main-heading"><input id="toggle2" name="shippingStatus" type="checkbox"> Ship to a Different address?</h3>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="open2" style="padding-top:40px">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-wrapper form-group">
                                                <input type="text" class="form-control" id="nameInput"
                                                       placeholder="Ship Name" name="ship_name" value="{{ Auth::user()->name }}">
                                                <label class="form-control-label">Sip Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-wrapper form-group">
                                                <input type="text" class="form-control" id="emailInput"
                                                       placeholder="Email" name="ship_email" value="{{ Auth::user()->email }}">
                                                <label class="form-control-label">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-wrapper form-group">
                                                <input type="text" class="form-control"name="ship_phone" id="phoneInput"
                                                       placeholder="Phone">
                                                <label class="form-control-label">Phone</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-wrapper form-group">
                                                <input type="text" class="form-control" id="emailInput"
                                                       placeholder="Country" name="ship_country" value="Bangladesh">
                                                <label class="form-control-label">Country</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label class="form-control-label">City</label>
                                            <div class="input-wrapper form-group">
                                                <select name="ship_city" id="">
                                                    <option value="">Choose your city..</option>
                                                    @foreach ($districts as $district)
                                                    <option value="{{ $district->name }}">{{ $district->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="input-wrapper form-group">
                                                <input type="text" class="form-control" name="ship_postcode" id="addressInput"
                                                       placeholder="Post Code">
                                                <label class="form-control-label">Post Code</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-9">
                                            <div class="input-wrapper form-group">
                                                <input type="text" class="form-control" name="ship_address" id="addressInput"
                                                       placeholder="Address">
                                                <label class="form-control-label">Address</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 pt-5" >
                                    <div class="input-wrapper form-group">
                                        <textarea type="text" class="form-control" id="nameInput"
                                               placeholder="Enter Your Note" name="note" >
                                        </textarea>
                                        <label class="form-control-label">Note</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12 ml-auto">
                                    <!-- cart total details -->
                                    <div class="cart_totals">
                                        
                                        <p>Please select your payment method:</p>
                                        <input type="radio" id="cash" name="payment_type" value="cash_on_delivery" checked>
                                        <label for="cash">Cash On Delivery</label><br>
                                        <input type="radio" id="ssl" name="payment_type" value="ssl_commerz">
                                        <label for="ssl">SSL Commerz</label><br>
                                        <div class="expenses">
                                            <span>Subtotal</span>
                                            <span class="price">TK. {{ session('cart_subtitle') }}</span>
                                        </div>
                                        @php
                                            $shipping = 60;
                                            $total = session('cart_subtitle')+$shipping;
                                        @endphp
                                        <div class="expenses">
                                            <span>Shipping</span>
                                            <span class="price">TK.  {{ $shipping }}</span>
                                        </div>
                                        <div class="total-price">
                                            <span>Total</span>
                                            <span class="price">{{  $total }}</span>
                                        </div>
                                        @php
                                            session(['total' => $total]);
                                        @endphp
                                        <button type="submit" class="button button--dark button-block">Place order</button>
                                    </div>
                                    <!-- end cart total details -->
                                </div>
                                
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <!-- end checkout form -->
                        <!-- end select address -->
                        <!-- cart total information -->
                        
                        <!-- end cart total information -->
                    </div>
                </div>
            </form>
            <!-- end cart form -->
        </div>
    </div>
    <!-- end cart section -->
</div>
<!-- end main content section -->
@endsection