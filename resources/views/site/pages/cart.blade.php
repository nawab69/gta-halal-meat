@extends('site.app')
@section('title', 'Shopping Cart')
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
                            <li class="active">Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of breadcrumb area  ======-->


    <!--=============================================
    =            Cart page content         =
    =============================================-->


    <div class="page-section section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @if (\Cart::isEmpty())
                        <p class="alert alert-warning">Your shopping cart is empty.</p>
                    @else
                        <form action="#">
                            @csrf
                            <!--=======  cart table  =======-->

                            <div class="cart-table table-responsive mb-40">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\Cart::getContent() as $item)
                                    <tr>
                                        @php
                                        $product = App\Models\Product::where('id',$item->product_id)->first();
                                        @endphp
                                        <td class="pro-thumbnail"><a href="#"><img src="{{asset('public/storage/'.$product->image)}}" class="img-fluid" alt="Product"></a></td>
                                        <td class="pro-title"><figure class="media">
                                                <figcaption class="media-body">
                                                    <h6 class="title text-truncate">{{ Str::words($item->name,20) }}</h6>
                                                    @foreach($item->attributes as $key  => $value)
                                                        <dl class="dlist-inline small">
                                                            @php

                                                            @endphp
                                                            <dt>{{ ucwords(str_replace('_', ' ', $key)) }}: </dt>
                                                            <dd>{{ ucwords($value) }}</dd>
                                                        </dl>
                                                    @endforeach
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td class="pro-price"><span>{{ config('settings.currency_symbol'). number_format(round($item->price, 2),2,'.','') }}</span></td>
                                        <td class="pro-quantity"><span>{{ $item->quantity }}</span></td>
                                        <td class="pro-subtotal"><span>{{config('settings.currency_symbol'). number_format(round($item->price * $item->quantity, 2),2,'.','')}}</span></td>
                                        <td class="pro-remove"><a href="{{ route('checkout.cart.remove', $item->id) }}"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <!--=======  End of cart table  =======-->


                        </form>

                    <div class="row">

                        <div class="col-lg-6 col-12">



                        </div>
                        <div class="col-lg-6 col-12 d-flex">
                            <!--=======  Cart summery  =======-->

                            <div class="cart-summary">
                                <div class="cart-summary-wrap">
                                    <h4>Cart Summary</h4>
                                    <p>Sub Total <span>{{ config('settings.currency_symbol') }}{{ number_format(round(\Cart::getSubTotal(), 2),2,'.','')  }}</span></p>
                                    <p>Tax <span>{{ config('settings.currency_symbol') }}{{ number_format(round((\Cart::getSubTotal() * (config('settings.tax'))/100), 2),2,'.','')}}</span></p>
                                    <h2>Grand Total <span>{{ config('settings.currency_symbol') }}{{ number_format(round(\Cart::getSubTotal()+(\Cart::getSubTotal() * (config('settings.tax'))/100), 2),2,'.','')}}</span></h2>
                                </div>
                                <div class="cart-summary-button">
                                    <button onclick="window.location='{{ route('checkout.index') }}'" class="checkout-btn">Checkout</button>
                                    <button onclick="window.location='{{ route('checkout.cart.clear') }}'" class="delete-btn">Clear Cart</button>
                                </div>
                            </div>

                            <!--=======  End of Cart summery  =======-->

                        </div>

                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--=====  End of Cart page content  ======-->

@stop
