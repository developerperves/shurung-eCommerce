@extends('layouts.frontendApp')
@section('title')
    User Register
@endsection
@section('frontendContent')
    
<!-- main content section -->
<div class="container-fluid full-container">
    <div class="row full-container_row">
        {{-- <div class="col-lg-6 content-left order-2">
            <div class="content-left-wrapper wrapper-img" style="background-image: url('{{ asset('frontendAsset') }}/assets/images/bg-03.jpg');
">
            </div>
        </div> --}}
        <div class="col-lg-6 m-auto">
            <div class="register-link">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}">Login</a></div>
            <form class="register-form" method="POST" action="{{ route('user.register.post') }}">
                @csrf
                <h2 class="title">Create an account</h2>
                <div class="custom-form">
                            <div class="input-wrapper form-group">
                                <input type="text" class="form-control" id="nameInput"
                                       placeholder="First name" name="name">
                                <label class="form-control-label">First name</label>
                            </div>
                    <div class="input-wrapper form-group">
                        <input type="text" class="form-control" id="emailInput"
                               placeholder="Email Address/User name" name="email">
                        <label class="form-control-label">Email Address</label>
                    </div>
                    <div class="input-wrapper form-group">
                        <div class="password-box">
                            <input type="password" class="form-control" id="PassInput"
                                   placeholder="Password" name="password">
                            <label class="form-control-label">Password</label>
                            <div class="password-box-icon">
                                            <span class="showhidepassword"><i
                                                    class="far fa-eye-slash"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-wrapper form-group">
                        <div class="password-box">
                            <input type="password" class="form-control" id="PassInput"
                                   placeholder="Confirm Password" name="password_confirmation">
                            <label class="form-control-label">Confirm Password</label>
                            <div class="password-box-icon">
                                            <span class="showhidepassword"><i
                                                    class="far fa-eye-slash"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="custom-form_btn">
                        <button type="submit" class="button button--dark button-block">Create account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection