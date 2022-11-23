@extends('main')

@section('body')

<!-- Outer Row -->
<div class="row d-flex justify-content-center align-items-center" style="height: 90vh">

    <div class="col-md-8">

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 bfar-bg">
                        <img src="{{asset('images/bfar.png')}}" alt="Login Logo" id="login-logo">
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                @include('messages')

                            </div>

                            <form method="post" action="{{ route('login.custom') }}">	
                                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                      <p class="lead fw-bold text-center mb-5 me-">Clarin Freshwater Fish Farm Record Management System</p>
                                </div>
              
                                @if (session()->has('error'))
              
                                      <div class="alert alert-danger">
                                          {{ session()->get('error') }}
                                      </div>
              
                                  @endif
                                  @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                  
                                  @csrf
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text bg-info text-white"><i class="fa-solid fa-envelope"></i></div>
                                        <input type="text" name="email" class="form-control" placeholder="Enter Email" />
                                    </div>
                                </div>
                
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text bg-danger text-white"><i class="fa fa-lock"></i></div>
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password" />
                                    </div>
                                </div>
                
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                  LOGIN
                                </button>
                              </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/registration">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection
