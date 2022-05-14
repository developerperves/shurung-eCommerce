@extends('layouts.frontendApp')
@section('title')
    SHURUNG | Update Profile
@endsection
@section('frontendContent')


    <!-- breadcrumb section -->
    <div class="custom-breadcrumb custom-breadcrumb--minimal">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.account') }}">My Account</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
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
                            <li class="control_item active">
                                <a href="{{ route('user.account') }}">
                                    <span><i class="icon-user"></i></span>My account</a>
                            </li>
                            <li class="control_item">
                                <a href="{{ route('user.order') }}">
                                    <span><i class="icon-basket"></i></span>My orders</a></li>
                            {{-- <li class="control_item"><a href="{{ route('password.reset', Auth::id()) }}">
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
                                <h3 class="panel-title">Update Profile</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 update_name_form">
                                    <label for="nameform">Update Name</label>
                                    <hr>
                                    <form action="{{ route('update.profile.name') }}" method="post">
                                        @csrf
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                        <br>
                                        <button type="submit" class="btn btn-primary"> Submit </button>
                                    </form>
                                    <br>
                                    
                                    <label for="photoform">Update Profile Photo</label>
                                    <hr>
                                    <form action="{{ route('update.profile.photo') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label for="profile_photo">Profile Photo</label>
                                        <input type="file" name="photo" class="form-control">
                                        <img class="mt-3" style="width: 50px;" src="{{ asset('uploads/profile') }}/{{ Auth::user()->photo }}" alt="{{ Auth::user()->photo }}">
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-primary"> Submit </button>
                                    </form>
                                </div>
                                <div class="col-lg-6 update_photo_form">
                                    <label for="passwordform">Update Password</label>
                                    <hr>
                                    <form method="POST" action="{{ route('update.profile.password') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter Old Password</label>
                                            <input type="password" class="form-control" name="old_password" placeholder="Enter Old Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter New Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter New Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Retype Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Retype Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                </div>
                            </div>
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