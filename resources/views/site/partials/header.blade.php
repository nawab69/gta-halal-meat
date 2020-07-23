

<!--=============================================
=            Header         =
=============================================-->

<header>
    <!--=======  header top  =======-->
    <div style="height: 50px; background-color: white;"></div>

    <!--=======  End of header top  =======-->

    <!--=======  header bottom  =======-->

    <div class="header-bottom header-bottom-other header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12 text-lg-left text-md-center text-sm-center">
                    <!-- logo -->
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('public/storage/'.config('settings.site_logo')) }}" class="img-fluid" alt="">
                        </a>
                    </div>
                    <!-- end of logo -->
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="menubar-top d-flex justify-content-between align-items-center flex-sm-wrap flex-md-wrap flex-lg-nowrap mt-sm-15">
                        <!-- header phone number -->
                        <div class="header-contact d-flex">
                            <div class="phone-icon">
                                <img src="{{asset('public/frontend/images/icon-phone.png')}}" class="img-fluid" alt="">
                            </div>
                            <div class="phone-number">
                                Phone: <span class="number">{{config('settings.phone')}}</span>
                            </div>
                        </div>
                        <!-- end of header phone number -->
                        <!-- search bar -->
                        <div class="header-advance-search">
                            <form action="{{route('search')}}" method="get">
                                <input value="{{$query ?? ''}}" type="text" name="search" placeholder="Search your product">
                                <button><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <!-- end of search bar -->
                        <!-- shopping cart -->
                        <div class="shopping-cart" id="shopping-cart">
                            <a href="{{ route('checkout.cart') }}">
                                <div class="cart-icon d-inline-block">
                                    <span class="icon_bag_alt"></span>
                                </div>
                                <div class="cart-info d-inline-block">
                                    <p>Shopping Cart
                                        <span>
												{{ $cartCount }} items - {{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }}
											</span>
                                    </p>
                                </div>
                            </a>
                            <!-- end of shopping cart -->

                            <!-- cart floating box -->
                            <div class="cart-floating-box" id="cart-floating-box">
                                <div class="cart-items">
                                    @foreach(\Cart::getContent() as $item)
                                        @php
                                            $product = App\Models\Product::where('id',$item->product_id)->first();
                                        @endphp
                                    <div class="cart-float-single-item d-flex">
                                        <span class="remove-item"><a href="#"><i class="fa fa-times"></i></a></span>
                                        <div class="cart-float-single-item-image">
                                            <a href="{{asset('public/storage/'.$product->image)}}"><img src="{{asset('public/storage/'.$product->image)}}" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="cart-float-single-item-desc">
                                            <p class="product-title"> <a href="{{ route('product.show', $product->slug) }}">{{ Str::words($item->name,20) }} </a></p>
                                            <p class="price"><span class="count">{{ $item->quantity }} Lb x </span>{{ config('settings.currency_symbol'). $item->price }}</p>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="cart-calculation">
                                    <div class="calculation-details">
                                        <p class="total">Subtotal <span>{{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }}</span></p>
                                    </div>
                                    <div class="floating-cart-btn text-center">
                                        <a href="{{ route('checkout.index') }}">Checkout</a>
                                        <a href="{{ route('checkout.cart') }}">View Cart</a>
                                    </div>
                                </div>
                            </div>
                            <!-- end of cart floating box -->
                        </div>
                    </div>

                @include('site.partials.nav')

    </div>

    <!--=======  End of header bottom  =======-->


</header>

<!--=====  End of Header  ======-->



