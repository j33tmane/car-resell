@extends('layouts.master-without-nav')
@section('title')
    @lang('translation.Login')
@endsection
@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="{{ url('index') }}" class="mb-5 d-block auth-logo">
                            <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="22"
                                class="logo logo-dark">
                            <img src="{{ URL::asset('/assets/images/logo-light.png') }}" alt="" height="22"
                                class="logo logo-light">
                        </a>

                       
                </div>
            </div> --}}
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <marquee behavior="scroll" direction="left" scrollamount="10" style="margin: 2% 14% 0% 14%">
                            <img src="{{ URL::asset('/assets/my-img/car-logo.gif') }}" width="10%">
                        </marquee>
                        {{-- <img src="https://abhcars.in/car.gif" width="10%"></marquee> --}}
                        <div class="app-brand justify-content-center bg-info rounded py-2" style="margin: 2% 14% 2% 14%">
                            <center><a href="https://abhcars.in/" class="app-brand-link gap-2">
                                    <span class="app-brand-text demo text-body fw-semibold text-uppercase">
                                        <img src="{{ URL::asset('/assets/my-img/ABH-logo.png') }}" width="230px"></span>
                                </a></center>
                        </div>


                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p class="text-muted">Sign in to continue to ABHCARS.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email/Mobile</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email', '') }}" id="email"
                                            placeholder="Enter Email address Or Mobile Number">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>The mobile/email is required</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="text-muted">Forgot
                                                    password?</a>
                                            @endif
                                        </div>
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="userpassword" placeholder="Enter password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="auth-remember-check"
                                            name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>

                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log
                                            In</button>
                                    </div>



                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Don't have an account ? <a href="{{ url('register') }}"
                                                class="fw-medium text-primary"> Create Account</a> </p>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
