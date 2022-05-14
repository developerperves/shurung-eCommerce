@extends('layouts.frontendApp')
@section('title')
    My Account | SHURUNG
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
							<li class="control_item active">
								<a href="{{ route('user.account') }}">
									<span><i class="icon-user"></i></span>My account</a>
							</li>
							<li class="control_item">
								<a href="{{ route('user.order') }}">
									<span><i class="icon-basket"></i></span>My orders</a></li>
						
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
								<h3 class="panel-title">My Account</h3>
							</div>
							<div class="my-account-body">
								<div class="image-part">
									<img src="{{ asset('uploads/profile') }}/{{ Auth::user()->photo }}" alt="{{ Auth::user()->photo }}">
									<a href="{{ route('user.account.update') }}" class="change-btn text-center" style="line-height: 45px;">Update Profile</a>
								</div>
								<div class="text-part">
									<div class="row">
										<div class="col-lg-6">
											<div>
												<p>Name</p>
												<h5>{{ Auth::user()->name }}</h5>

											</div>
										</div>
										<div class="col-lg-6">
											<div>
												<p>Email</p>
												<h5>{{ Auth::user()->email }}</h5>
											</div>
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
	</div>
	<!-- end dashboard section -->
	<!-- end main content section -->
@endsection