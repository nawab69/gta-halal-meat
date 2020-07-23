@extends('site.app')
@section('title', 'Register')
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
                            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Register</li>
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
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                    <form action="{{ route('register') }}" method="POST" role="form">
                        @csrf

                        <div class="login-form">
                            <h4 class="login-title">Register</h4>

                            <div class="row">
                                <div class="col-md-6 col-12 mb-20">
                                    <label for="first_name">First Name</label>
                                    <input style="@error('first_name') border-color: red; @enderror" class="mb-0" type="text" placeholder="First Name" name="first_name" id="first_name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label for="last_name">Last name</label>
                                    <input type="text" style="@error('last_name') border-color: red; @enderror" class="mb-0" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label for="email">E-Mail Address</label>
                                    <input type="email" style="@error('email') border-color: red; @enderror"  class="mb-0" name="email" id="email" value="{{ old('email') }}" placeholder="Email Address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label for="password">Password</label>
                                    <input type="password" style="@error('password') border-color: red; @enderror"  class="mb-0" name="password" id="password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" style="@error('password_confirmation') border-color: red; @enderror"  class="mb-0" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label for="address">Address</label>
                                    <input class="mb-0" type="text" name="address" id="address" value="{{ old('address') }}" placeholder="Full Addresss">
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label for="apartment">Apartment / Unit No</label>
                                    <input class="mb-0" type="text" name="country" id="apartment" value="{{ old('country') }}" placeholder="Enter Apartment / Unit No">
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label for="city">City</label>
                                    <input type="text" class="mb-0" name="city" id="city" value="{{ old('city') }}" placeholder="City">
                                </div>

                                <div class="col-md-6 mb-20">
                                    <label for="post_code">Postal Code</label>
                                    <input type="text" class="mb-0" name="post_code" id="post_code" value="{{ old('post_code') }}" placeholder="Postal Code">
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label for="country">Provinces</label>
                                    <select id="country" style="border-radius: 25px;border-color: #828282" class="form-control" name="state">
                                        <option> Choose...</option>
                                        <option value="Ontario" selected="">Ontario</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="mb-0" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Phone Number">
                                </div>

                                <div class="col-4 mb-20">
                                    <button type="submit" class="register-button mt-0">Register</button>
                                </div>
                                <div class="col-8 mb-20">
                                    <small class="text-muted text-center">By clicking the 'Sign Up' button, you confirm that you accept our Terms of use and Privacy Policy.</small>
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
