@extends('main2')
@section('content')

<section class="container mt-5 mb-5">
	<!-- Jumbotron -->
	<div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 87%)">
	  <div class="container">
		<div class="row gx-lg-5 align-items-center">
		  <div class="col-lg-6 mb-5 mb-lg-0">
			<img src="{{ asset('images/bfar.png') }}"
			class="img-fluid" alt="Sample image">
		  </div>
  
		  <div class="col-lg-6 mb-5 mb-lg-0">
			<div class="card">
			  <div class="card-body py-5 px-md-5">

				<main class="signup-form">

                <form action="{{ route('register.custom') }}" method="POST">
										
				  <div class="d-flex flex-row align-items-center text-center justify-content-center justify-content-lg-start">
						<p class="lead fw-bold mb-5 me-">REGISTER NEW USER</p>
				  </div>

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
					@csrf
				  <!-- Name input -->
				  <div class="form-outline mb-4">
					  <div class="input-group mb-3">
						<div class="input-group-text bg-info text-white"><i class="fa-solid fa-envelope"></i></div>
							<input type="Text" name="name" class="form-control" placeholder="Name" />
								@if($errors->has('name'))
									<span class="text-danger">{{ $errors->first('name') }}</span>
								@endif
				  		</div>
				  </div>
  
				  <!-- Email input -->
				  <div class="form-outline mb-4">
					<div class="input-group mb-3">
					<div class="input-group-text bg-warning text-white"><i class="fa-solid fa-envelope"></i></div>
						<input type="text" name="email" class="form-control" placeholder="Email" />
                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif                       
					</div>
				  </div>

                  <!-- Password input -->
				  <div class="form-outline mb-4">
					<div class="input-group mb-3">
					<div class="input-group-text bg-danger text-white"><i class="fa-solid fa-user"></i></div>
					<input type="password" name="password" class="form-control" placeholder="Password" />
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif                
					</div>     
				  </div>
  
				  <!-- Submit button -->
				  <button type="submit" class="btn btn-success btn-block mb-4 float-end">
					Sign Up
				  </button>
				  <hr>
				  <div class="text-center">
					<a class="small" href="/login">Already have an Account</a>
				</div>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Jumbotron -->
	{{-- <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary" style="margin-top: 51px">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2022. All rights reserved.
    </div>
    <!-- Copyright -->
  </div> --}}
</section>

@endsection