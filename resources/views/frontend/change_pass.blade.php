@extends('layouts.fronendApp')
@section('title')
    Change Password | SHURUNG
@endsection
@section('frontendContent')
    
    <!-- breadcrumb section -->
    <div class="custom-breadcrumb custom-breadcrumb--minimal">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                            <li class="control_item">
                                <a href="{{ route('user.order') }}">
                                    <span><i class="icon-basket"></i></span>My orders</a></li>
                            {{-- <li class="control_item active"><a href="change-pass.html">
                                    <span><i class="icon-lock"></i></span>Reset
                                    Password</a>
                            </li> --}}
                            <li class="control_item">
                                <a href="#">
                                    <span><i class="icon-exit"></i></span>Log
                                    out</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end dashboard controls -->
                    <!-- dashboard information profile section -->
                    <div class="col-lg-9 dashboard__info">
                        <div class="panel panel-box panel-box-img"
                            style="background-image: url('{{ asset('frontendAsset') }}/assets/images/bg-07.jpg')">
                            <div class="panel-heading">
                                <h3 class="panel-title">Change password</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 offset-lg-6">
                                    <div class="panel-form custom-form py-60">
                                        <div class="input-wrapper form-group">
                                            <div class="password-box">
                                                <input type="password" class="form-control" placeholder="Old Password">
                                                <label class="form-control-label">Old Password</label>
                                                <div class="password-box-icon">
                                                    <span class="showhidepassword"><i
                                                            class="far fa-eye-slash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-wrapper form-group">
                                            <div class="password-box">
                                                <input type="password" class="form-control" placeholder="New Password">
                                                <label class="form-control-label">New Password</label>
                                                <div class="password-box-icon">
                                                    <span class="showhidepassword"><i
                                                            class="far fa-eye-slash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-wrapper form-group">
                                            <div class="password-box">
                                                <input type="password" class="form-control"
                                                    placeholder="Confirm Password">
                                                <label class="form-control-label">Confirm Password</label>
                                                <div class="password-box-icon">
                                                    <span class="showhidepassword"><i
                                                            class="far fa-eye-slash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="custom-form_btn">
                                            <button type="submit"
                                                class="button button--dark button-block">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end dashboard information profile section -->
            </div>
        </div>
        <!-- end dashboard section -->
    </div>
    <!-- end main content section -->
@endsection