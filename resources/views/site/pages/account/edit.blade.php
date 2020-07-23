@extends('site.app')
@section('title', 'Orders')
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
                        <li><a href="{{route('site.pages.homepage')}}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Address</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=====  End of breadcrumb area  ======-->

<!--=============================================
=            My account page section         =
=============================================-->

<div class="my-account-section section position-relative mb-50 fix">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="row justify-content-center">
                    <div class="col-8">


                                <div class="myaccount-content">
                                    <h3>Account Details</h3>

                                    <div class="account-details-form">
                                        <form action="{{route('account.updateAddress')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 mb-30">
                                                    <label for="address">Address</label>
                                                    <input id="address" placeholder="Address" type="text" name="address" value="{{$address->address}}">
                                                </div>
                                                <div class="col-6 mb-30">
                                                    <label for="country">Apartment / Unit No.</label>
                                                    <input id="country" placeholder="Apartment / Unit No." type="text" name="country" value="{{$address->country}}">
                                                </div>

                                                <div class="col-6 mb-30">
                                                    <label for="city">City</label>
                                                    <input id="city" placeholder="City" type="text" name="city" value="{{$address->city}}">
                                                </div>

                                                <div class="col-6 mb-30">
                                                    <label for="state">Provinces</label>
                                                    <br>
                                                
                                                    <select name="state" id="state" class="nice-select">
                                                        <option value="Ontario" selected>Ontario</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-30">
                                                    <label for="post_code">Postal Code</label>
                                                    <input id="post_code" placeholder="postal code" type="text" name="post_code" value="{{$address->post_code}}">
                                                </div>
                                                <div class="col-6 mb-30">
                                                    <label for="Phone">Phone</label>
                                                    <input id="phone" placeholder="phone" type="text" name="phone" value="{{$address->phone}}">
                                                </div>
                                                
                                                <div class="col-12">
                                                    <button class="save-change-btn">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                    </div>

                    <!-- My Account Tab Content End -->
                </div>

            </div>
        </div>
    </div>
</div>

<!--=====  End of My account page section  ======-->
@stop
