@extends('site.app')
@section('title', 'Login')
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
                            <li class="active">Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of breadcrumb area  ======-->

    <!--=============================================
    =            Login register page content         =
    =============================================-->

    <div class="page-content mb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-8 mb-30">
                    <!-- Login Form s-->
                    <form action="{{ route('login') }}" method="POST" role="form">
                        @csrf

                        <div class="login-form">
                            <h4 class="login-title">Login</h4>

                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label for="email">Email Address*</label>
                                    <input id="email" style="@error('email') border-color: red; @enderror" class="mb-0" type="email" placeholder="Email Address"  value="{{ old('email') }}" name="email">
                                    @error('email')
                                    <span style="padding: 5px 10px;" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="password">Password</label>
                                    <input style="@error('password') border-color: red; @enderror" id="password" class="mb-0" type="password" placeholder="Password"  value="{{ old('password') }}" name="password">
                                    @error('password')
                                    <span style="padding: 5px 10px;" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-8">

                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                        <input name="remember" type="checkbox" id="remember_me"  {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember_me">{{ __('Remember Me') }}</label>
                                    </div>

                                </div>

                                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                    <a href="https://gtahalalmeat.com/password/reset"> Forgot Password?</a>
                                </div>

                                <div class="col-md-12">
                                    <button class="register-button mt-0">Login</button>
                                </div>
                                <div align="center" class="reg-login-link">
                                    Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of Login register page content  ======-->

@stop
