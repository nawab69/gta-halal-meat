@extends('site.app')
@section('title', $product->name)
@section('content')

    <!--=============================================
    =            breadcrumb area         =
    =============================================-->

    <div class="breadcrumb-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col">
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of breadcrumb area  ======-->

    <!--=============================================
    =            single product content         =
    =============================================-->

    <div class="single-product-content ">
        <div class="container">
            <!--=======  single product content container  =======-->
            <div class="single-product-content-container mb-35">
                <div class="row">
                    <div class="col-sm-12">
                        @if (Session::has('message'))
                            <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-xs-12">


                        <!-- product image gallery -->
                        <div class="product-image-slider d-flex flex-custom-xs-wrap flex-sm-nowrap align-items-center mb-sm-35">
                            <!--Modal Tab Content Start-->
                            <div class="tab-content product-large-image-list">
                                <div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                                    <!--Single Product Image Start-->
                                    <div class="single-product-img easyzoom img-full">
                                        <img style="width:370px;padding:10px;align:center;" src="{{asset('public/storage/'.$product->image)}}" alt="">
                                        <a href="{{asset('public/storage/'.$product->image)}}" class="big-image-popup"><i class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!--Modal Content End-->

                        </div>
                        <!-- end of product image gallery -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <!-- product quick view description -->
                        <div class="product-feature-details">
                            <h2 class="product-title mb-15">{{$product->name}}</h2>

                            <h2 class="product-price mb-15">
                                @if($product->sale_price > 0)
                                <span class="discounted-price">{{config('settings.currency_symbol')}}<span id="productPrice" >{{$product->sale_price}}</span> / Lb</span>
                                    <del class="discounted-price"> $ {{$product->price}} / Lb</del>
                                    @else
                                    <span class="discounted-price"> $ <span id="productPrice">{{$product->price}}</span> / Lb</span>
                                @endif

                            </h2>

                            <p class="product-description mb-20">{{$product->description}}</p>

                            <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <dl class="dlist-inline">

                                            @foreach($attributes as $attribute)
                                                @php $attributeCheck = in_array($attribute->id, $product->attributes->pluck('attribute_id')->toArray()) @endphp
                                                @if ($attributeCheck)
                                                    <dt>{{ $attribute->name }}: </dt>
                                                    <dd>
                                                        <select class="form-control form-control-sm option" style="width:180px;" name="{{ strtolower($attribute->name ) }}">
                                                            <option data-price="0" value="0"> Select Instructions </option>
                                                            @foreach($product->attributes as $attributeValue)
                                                                @if ($attributeValue->attribute_id == $attribute->id)
                                                                    <option
                                                                        data-price="{{ $attributeValue->price }}"
                                                                        value="{{ $attributeValue->value }}"> {{ $attributeValue->value }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </dd>
                                                @endif
                                            @endforeach
                                        </dl>
                                    </div>
                                </div>
                               <div class="row">
                                   <div class="col-md-12 col-12 mb-20">
                                       <label for="order_notes"><b>Other Instruction</b></label>
                                       <textarea id="order_notes" class="form-control" name="other_instruction" rows="3"></textarea>
                                   </div>
                               </div>

                                <div class="row">
                                    <div class="col-sm-12">

                                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                                <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">

                                    </div>
                                </div>
                            <div class="cart-buttons mb-20">
                                <div class="pro-qty mr-20 mb-xs-20">
                                    <input type="number" value="1" min="1" max="{{ $product->quantity }}" name="qty">
                                </div>
                                <span class="mr-5">Lb</span>
                                <div class="add-to-cart-btn">
                                   <button type="submit"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- end of product quick view description -->
                    </div>
                </div>
            </div>

            <!--=======  End of single product content container  =======-->

        </div>

    </div>

    <!--=====  End of single product content  ======-->

@stop
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#addToCart').submit(function (e) {
                if ($('.option').val() == 0) {
                    e.preventDefault();
                    alert('Please select an option');
                }
            });
            $('.option').change(function () {
                $('#productPrice').html("{{ $product->sale_price != '' ? $product->sale_price : $product->price }}");
                let extraPrice = $(this).find(':selected').data('price');
                let price = parseFloat($('#productPrice').html());
                let finalPrice = (Number(extraPrice) + price).toFixed(2);
                $('#finalPrice').val(finalPrice);
                $('#productPrice').html(finalPrice);
            });
        });
    </script>
@endpush
