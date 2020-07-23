@extends('site.app')
@section('title', 'Reset Password')
@section('content')

    <!--=============================================
    =            breadcrumb area         =
    =============================================-->

    <div class="breadcrumb-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="https://gtahalalmeat.com"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Update Password</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of breadcrumb area  ======-->
    
    <div class="page-content mb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-8 mb-30">
                    <!-- Login Form s-->
                    <form action="{{ route('password.update') }}" method="POST" role="form">
                        @csrf
                        
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="login-form">
                            <h4 class="login-title">Login</h4>

                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label for="email">Email Address*</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                

                                <div class="col-md-12">
                                    <button class="register-button mt-0">{{ __('Reset Password') }}</button>
                                </div>
                                

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @stop