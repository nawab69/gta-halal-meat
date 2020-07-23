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
                        <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">My Account</li>
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

                <div class="row">

                    <!-- My Account Tab Menu Start -->
                    <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                Dashboard</a>

                            <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>

{{--                            <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Payment--}}
{{--                                Method</a>--}}

                            <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a>

                            <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>


                            @guest
                            @else

                                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->

                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Dashboard</h3>

                                    <div class="welcome">
                                        <p>Hello, <strong>{{$user->first_name.' '.$user->last_name}}</strong> (If Not <strong>{{$user->first_name}} !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
                                    </div>

                                    <p class="mb-0">From your account dashboard. you can easily check &amp; view your
                                        recent orders, manage your shipping and billing addresses and edit your
                                        password and account details.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Orders</h3>

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>Order No</th>
                                                <th>Items</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @forelse ($user->orders as $order)
                                            <tr>
                                                <td>{{ $order->order_number }}</td>
                                                <td>{{ $order->item_count }}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>{{$order->status}}</td>
                                                <td>{{ config('settings.currency_symbol') }}{{ round($order->grand_total, 2) }}</td>
                                                <td><a href="{{route('account.orderDetails',[$order->order_number])}}">View Details</a> </td>
                                            </tr>
                                            @empty
                                                <div class="col-sm-12">
                                                    <p class="alert alert-warning">No orders to display.</p>
                                                </div>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
{{--                            <div class="tab-pane fade" id="payment-method" role="tabpanel">--}}
{{--                                <div class="myaccount-content">--}}
{{--                                    <h3>Payment Method</h3>--}}

{{--                                    <p class="saved-message">You Can't Saved Your Payment Method yet.</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Billing Address</h3>

                                    <address>
                                        <p><strong>{{$user->first_name.' '.$user->last_name}}</strong></p>
                                        <p>{{$user->addressAll->address}} <br>
                                            {{$user->addressAll->city}}, {{$user->addressAll->state}} {{$user->addressAll->post_code}}</p>
                                        <p>Mobile: {{$user->addressAll->phone}}</p>
                                    </address>
                                    <a href="{{route('account.address')}}" class="btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i>Edit Address</a>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Account Details</h3>

                                    <div class="account-details-form">
                                        <form action="{{route('account.updateInfo')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="first-name" placeholder="First Name" type="text" name="first_name" value="{{$user->first_name}}">
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="last-name" placeholder="Last Name" type="text" name="last_name" value="{{$user->last_name}}">
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="email" placeholder="Email Address" type="email" name="email" value="{{$user->email}}">
                                                </div>

                                                <div class="col-12 mb-30"><h4>Password change</h4></div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="new-pwd" placeholder="New Password" type="password" name="password">
                                                </div>

                                                <div class="col-12">
                                                    <button class="save-change-btn">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
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
