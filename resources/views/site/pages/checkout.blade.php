@extends('site.app')
@section('title', 'Checkout')
@section('content')

    @php
    $user = auth()->user();
    @endphp

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
                            <li class="active">Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 register-user">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                        @if (Session::has('successs'))
                            <p class="alert alert-success">{{ Session::get('successs') }}</p>
                        @endif
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of breadcrumb area  ======-->

    <!--=============================================
    =            Checkout page content         =
    =============================================-->

    <div class="page-section section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Checkout Form s-->
                    <form action="{{ route('checkout.place.order') }}" method="POST" role="form" class="checkout-form">
                        @csrf
                        <div class="row row-40">

                            <div class="col-lg-7 mb-20">

                                <!-- Billing Address -->
                                <div id="billing-form" class="mb-40">
                                    <h4 class="checkout-title">Billing Address</h4>

                                    <div class="row">

                                        <div class="col-md-6 col-12 mb-20">
                                            <label for="first_name">First Name*</label>
                                            <input id="first_name" name="first_name" type="text" placeholder="First Name" value="{{ old('first_name', $user->first_name ?? '')}}" required>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label for="last_name">Last Name*</label>
                                            <input name="last_name" id="last_name" type="text" placeholder="Last Name" value="{{ old('last_name', $user->last_name ?? '')}}" required>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label for="email">Email Address*</label>
                                            <input id="email" name="email" type="email" placeholder="Email Address" value="{{ old('email', $user->email ?? '') }}" @if(\Illuminate\Support\Facades\Auth::user())readonly @endif required>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label for="phone">Phone no*</label>
                                            <input id="phone" name="phone_number" type="text" placeholder="Phone number" value="{{ old('phone_number', $user->addressAll->phone ?? '') }}" required>
                                        </div>

                                        <div class="col-12 mb-20">
                                            <label for="address">Address*</label>
                                            <input id="address" name="address"  type="text" placeholder=" Full Address" value="{{old('address', $user->addressAll->address ?? '')}}" required>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label for="apartment">Apartment / Unit No</label>
                                            <input id="apartment" name="country" type="text" placeholder="Apartment / Unit No" value="{{ old('country', $user->addressAll->country ?? '' ) }}">
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label for="city">City*</label>
                                            <input id="city" name="city" type="text" placeholder="City" value="{{ old('city', $user->addressAll->city ?? '') }}" required>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label for="state">Province*</label>
                                            <select id="state" name="state" class="nice-select" required>
                                                <option value="Ontario" selected>Ontario</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label for="post_code">Postal Code*</label>
                                            <input id="post_code" name="post_code" type="text" placeholder="Postal Code" value="{{ old('post_code', $user->addressAll->post_code ?? '')}}" required>
                                        </div>
                                        <div class="col-md-12 col-12 mb-20">
                                            <label for="order_notes">Order Notes</label>
                                            <textarea id="order_notes" class="form-control" name="notes" rows="3">Empty</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-20">
                                        <div class="check-box">
                                            <input type="checkbox" id="shiping_address" name="delivery_other" data-shipping>
                                            <label for="shiping_address">Delivery to Different Address</label>
                                        </div>
                                    </div>


                                    <!-- Shipping Address -->
                                    <div id="shipping-form" class="mb-40 mt-40">
                                        <h4 class="checkout-title">Delivery Address</h4>

                                        <div class="row">



                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="d_first_name">First Name*</label>
                                                <input id="d_first_name" name="d_first_name" type="text" placeholder="First Name" value="{{$user->first_name ?? ''}}">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="d_last_name">Last Name*</label>
                                                <input name="d_last_name" id="d_last_name" type="text" placeholder="Last Name" value="{{$user->last_name ?? ''}}">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="d_email">Email Address*</label>
                                                <input id="d_email" name="d_email" type="email" placeholder="Email Address" value="{{ $user->email ?? '' }}" @if(\Illuminate\Support\Facades\Auth::user())readonly @endif>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="d_phone">Phone no*</label>
                                                <input id="d_phone" name="d_phone_number" type="text" placeholder="Phone number" value="{{$user->addressAll->phone ?? ''}}">
                                            </div>

                                            <div class="col-12 mb-20">
                                                <label for="d_address">Address*</label>
                                                <input id="d_address" name="d_address"  type="text" placeholder=" Full Address" value="{{$user->addressAll->address ?? ''}}">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="d_apartment">Apartment / Unit No</label>
                                                <input id="d_apartment" name="d_country" type="text" placeholder="Apartment / Unit No" value="{{$user->addressAll->country ?? ''}}">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="d_city">City*</label>
                                                <input id="d_city" name="d_city" type="text" placeholder="City" value="{{$user->addressAll->city ?? ''}}">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="d_state">Province*</label>
                                                <select id="d_state" name="d_state" class="nice-select">
                                                    <option value="Ontario" selected>Ontario</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="d_post_code">Postal Code*</label>
                                                <input id="d_post_code" name="d_post_code" type="text" placeholder="Postal Code" value="{{$user->addressAll->post_code ?? ''}}">
                                            </div>

                                        </div>

                                    </div>


                                </div>
                            </div>






                            <div class="col-lg-5">
                                <div class="row">

                                    <!-- Cart Total -->
                                    <div class="col-12 mb-60">

                                        <h4 class="checkout-title">Cart Total</h4>

                                        <div class="checkout-cart-total">

                                            <h4>Product <span>Total</span></h4>

                                            <ul>
                                                @foreach(\Cart::getContent() as $item)
                                                <li>{{ Str::words($item->name,20) }} X {{ $item->quantity }} Lb <span>{{config('settings.currency_symbol').$item->price * $item->quantity}}</span></li>
                                                @endforeach
                                            </ul>

                                            <p>Sub Total <span>{{ config('settings.currency_symbol') }}<span id="subTotal">{{ \Cart::getSubTotal() }}</span></span></p>
                                            <p>Tax <span>{{ config('settings.currency_symbol') }}<span id="tax">{{ (\Cart::getSubTotal() * config('settings.tax'))/100 }}</span></span></p>
                                            <p>Delivery Charge <span>{{ config('settings.currency_symbol') }}<span id="delivery">0</span></span></p>
                                            @if(session()->has('coupon'))
                                            <p>Discount <span> - {{ config('settings.currency_symbol') }}<span id="discount">{{session()->get('coupon')['discound'] }}</span></span></p>
                                            <p style="display:none" id="discount_type">{{session()->get('coupon')['type']}}</p>
                                            @endif


                                            <h4>Grand Total <span>{{ config('settings.currency_symbol') }}<span id="total">0</span></span></h4>
                                        </div>
                                    </div>





                                    <!-- Delivery Type -->
                                    <div class="col-12" style="margin-top: -30px;">

                                        <h4 class="checkout-title">Delivery Type</h4>

                                        <div class="checkout-payment-method">

                                            <div class="single-method">
                                                <input type="radio" id="regular" name="delivery_type" value="regular">
                                                <label for="regular">Regular Delivery ({{config('settings.currency_symbol')}} {{config('settings.regular')}})</label>
                                            </div>

                                            <div class="single-method">
                                                <input type="radio" id="nextday" name="delivery_type" value="nextday">
                                                <label for="nextday">Next Day Delivery ({{config('settings.currency_symbol')}} {{config('settings.nextday')}})</label>
                                            </div>

                                            <div class="single-method">
                                                <input type="radio" id="sadqa" name="delivery_type" value="sadqa">
                                                <label for="sadqa">Sadqa</label>
                                            </div>


                                        </div>

                                    </div>


                                    <!-- Payment Method -->
                                    <div style="margin-top: 40px;" class="col-12">

                                        <h4 class="checkout-title">Payment Method</h4>

                                        <div class="checkout-payment-method">

                                            <div class="single-method">
                                                <input type="radio" id="payment_paypal" name="payment_mode" value="1">
                                                <label for="payment_paypal">Paypal</label>
                                                <p data-method="paypal">Pay With your Paypal Account</p>
                                            </div>

                                            <div class="single-method">
                                                <input type="radio" id="payment_payoneer" name="payment_mode" value="2">
                                                <label for="payment_payoneer">Card Payment</label>
                                                <p data-method="payoneer">Pay with your Visa, Mastercard</p>
                                            </div>

                                            <div class="single-method">
                                                <input type="radio" id="payment_interect" name="payment_mode" value="3">
                                                <label for="payment_interect" data-toggle="modal" data-target="#bank">E transfer</label>
                                                <p data-method="interect">Pay with Interac e transfer</p>
                                            </div>

                                            <div class="single-method">
                                                 <input name="terms" type="checkbox" id="accept_terms" data-toggle="modal" data-target="#terms">
                                                 <label for="accept_terms">I’ve read and accept the
                                                     <a style="color: blue;" data-toggle="modal" data-target="#terms"> Terms & Conditions</a>.
                                                </label>
                                                @error('terms')
                                                <strong class="pl-5" style="color: red">You have to accept our Terms and Conditions  </strong>
                                                @enderror
                                            </div>

                                        </div>

                                        <input type="hidden" name="tax" id="taxPrice">
                                        <input type="hidden" name="delivery" id="deliveryPrice">
                                        <input type="hidden" name="total" id="totalPrice">
                                        <input type="hidden" name="discount" id="totaldiscount">

                                        <button type="submit" class="place-order">Place order</button>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </form>
                    <!--=======  Discount Coupon  =======-->

                    <div class="discount-coupon" style="margin-top:50px; position: relative; width: 80%;">
                        <h4>Discount Coupon Code</h4>
                        <form action="{{route('coupons.check')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12 mb-25">
                                    <input type="hidden" name="subtotal" value="{{\Cart::getSubTotal()}}">
                                    <input type="text" placeholder="Coupon Code" name="code">
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <input style="background-color: #80bb01; color: white;" type="submit" value="Apply Code">
                                </div>
                            </div>
                        </form>
                    </div>

                    <!--=======  End of Discount Coupon  =======-->

                </div>
            </div>
        </div>
    </div>

    <!--=====  End of Checkout page content  ======-->











    <!-- Modal -->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" style="overflow-y: initial !important" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Terms and Conditions</h5>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                    <!--    <span aria-hidden="true">&times;</span>-->
                    <!--</button>-->
                </div>
                <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">
                    @php
                    $terms = App\Models\Page::where('name','terms')->first();
                    @endphp
                    {!! (new Parsedown)->text($terms->text) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">I have read this</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="privacy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" style="overflow-y: initial !important" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Privacy Policy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">
                    @php
                    $terms = App\Models\Page::where('name','privacy')->first();
                    @endphp
                    {!! (new Parsedown)->text($terms->text) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" style="overflow-y: initial !important" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Bank Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">
                    {!! (new Parsedown)->text(config('settings.bank_pay')) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@stop


@push('scripts')
    <script>
        $(document).ready(function () {

                $("#regular").prop("checked", true);
            let subTotal = parseFloat($( "#subTotal" ).html());
            let tax = parseFloat($( "#tax" ).html());
            let discount = parseFloat($( "#discount" ).html()) ;
            if(!discount){
                discount = 0;
            }
            let type = $( "#discount_type" ).html();
            let del = $( "input[name=delivery_type]:checked" ).val();
                if(del==='regular'){
                    delivery = {{config('settings.regular')}};
                }else if(del==='nextday'){
                    delivery = {{config('settings.nextday')}};
                }else if(del==='sadqa'){
                    delivery = {{config('settings.sadqa')}};
                }
            if(type==='delivery'){
                discount = delivery;
            }
            $('#discount').html(discount.toFixed(2));
            $('#totaldiscount').val(discount.toFixed(2));
            let total = (subTotal + tax + delivery - discount).toFixed(2);
            $('#delivery').html(delivery);
            $('#total').html(total);
            $('#deliveryPrice').val(delivery.toFixed(2));
            $('#taxPrice').val(tax.toFixed(2));
            $('#totalPrice').val(total);
            $('#discount').html(discount.toFixed(2));
            $('#totaldiscount').val(discount.toFixed(2));

            $( "input[name=delivery_type]:radio" ).change(function () {
                let del = $( "input[name=delivery_type]:checked" ).val();
                if(del==='regular'){
                    delivery = {{config('settings.regular')}};
                }else if(del==='nextday'){
                    delivery = {{config('settings.nextday')}};
                }else if(del==='sadqa'){
                    delivery = {{config('settings.sadqa')}};
                }
                if(type==='delivery'){
                    discount = delivery;
                }
                $('#delivery').html(delivery);
                let total = (subTotal + tax + delivery - discount).toFixed(2);
                $('#total').html(total);
                $('#deliveryPrice').val(delivery.toFixed(2));
                $('#taxPrice').val(tax.toFixed(2));
                $('#totalPrice').val(total);
                $('#discount').html(discount.toFixed(2));
                $('#totaldiscount').val(discount.toFixed(2));
            });
        });
    </script>
@endpush
