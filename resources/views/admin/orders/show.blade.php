@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-bar-chart"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header"><i class="fa fa-globe"></i> {{ $order->order_number }}</h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Date: {{ $order->created_at->toFormattedDateString() }}</h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-lg-4 col-md-12">
                            <b>Delivery To</b><hr>
                            <b>Name:</b> {{ $order->delivery->first_name }} {{ $order->delivery->last_name }}<br>
                            <b>Email:</b> {{ $order->delivery->email }}<br>
                            <b>Phone:</b> {{ $order->delivery->phone }}<br>
                            <b>Address:</b> {{ $order->delivery->address }}<br>
                            <b>Apartment / Unit No:</b> {{ $order->delivery->apartment }} <br>
                            <b>City:</b> {{ $order->delivery->city }}<br>
                            <b>City:</b> {{ $order->delivery->provinces }}<br>
                            <b>Postal Code:</b> {{ $order->delivery->post_code }}<br>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <b>Billing Info</b><hr>
                            <b>Name:</b> {{ $order->first_name }} {{ $order->last_name }}<br>
                            <b>Email:</b> {{ $order->email }}<br>
                            <b>Phone:</b> {{ $order->phone_number }}<br>
                            <b>Address:</b> {{ $order->address }}<br>
                            <b>Apartment / Unit No:</b> {{ $order->country }} <br>
                            <b>City:</b> {{ $order->city }}<br>
                            <b>Provinces:</b> {{ $order->delivery->provinces }}<br>
                            <b>Postal Code:</b> {{ $order->post_code }}<br>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <b>Order Details</b><hr>
                            <b>Order ID:</b> {{ $order->order_number }}<br>
                            <b>Payment Method:</b> {{ $order->payment_method }}<br>
                            <b>Payment Status:</b> {{ $order->payment_status == 1 ? 'Completed' : 'Not Completed' }}<br>
                            <b>Order Status:</b> {{ $order->status }}<br>
                            <b>Sub Total:</b> {{ config('settings.currency_symbol') }}{{ number_format(round( $order->sub_total, 2),2,'.','')  }}<br>
                            <b>Tax:</b> {{ config('settings.currency_symbol') }}{{ number_format(round($order->tax, 2),2,'.','')  }}<br>
                            <b>Delivery:</b> {{ config('settings.currency_symbol') }}{{ number_format(round($order->shipping, 2),2,'.','') }}<br>
                            <b>Discount:</b> {{ config('settings.currency_symbol') }}{{ number_format(round($order->discount, 2),2,'.','') }}<br>
                            <b>Total:</b> {{ config('settings.currency_symbol') }}{{ number_format(round($order->grand_total, 2),2,'.','')  }}<br>
                            <b>Delivery Type:</b> {{$order->delivery_type}}<br>
                        </div>
                    </div>
                    <hr>
                    <hr>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>Product</th>
                                    <th>SKU #</th>
                                    <th>Cutting Instruction</th>
                                    <th>Other Instruction</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->product->sku }}</td>
                                            <td>{{ $item->cutting_instruction }}</td>
                                            <td>{{ $item->other_instruction }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ config('settings.currency_symbol') }}{{ number_format(round($item->price, 2),2,'.','') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12"> <b>Order notes:</b> {{$order->notes}}</div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <form action="{{route('admin.orders.complete',$order->id )}}" method="post">
                                @csrf
                                <button class="btn btn-success" type="submit">Order Complete</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <form action="{{route('admin.orders.decline',$order->id )}}" method="post">
                                @csrf
                                <button class="btn btn-danger" type="submit">Order Decline</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <form action="{{route('admin.orders.refund',$order->id )}}" method="post">
                                @csrf
                                <button class="btn btn-dark" type="submit">Order Refund</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
