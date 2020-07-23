@extends('site.app')
@section('title', $category->name)
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
                            <li class="active">{{$category->name}} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of breadcrumb area  ======-->
    <!--=============================================
	=            Cateory page content               =
	=============================================-->

    <div class="faq-area page-content mb-50">
        <div style="align-items: center;" class="container">

            <h1 style="text-align: center; margin: 40px;"> {{$category->name}} </h1>
            <div style="text-align: center; align-items: center;">
                <div class="subch">

                    @forelse($category->products as $product)
                    <div class="subc">
                        <div class="slider-box">
                             <a href="{{ route('product.show', $product->slug) }}" class="price">


                            <div class="img-box">
                                <img src="{{asset('public/storage/'.$product->image)}}">
                            </div>
                            <p class="detail">{{$product->name}}
                                @if ($product->sale_price != 0)
                                    <a href="{{ route('product.show', $product->slug) }}" class="price"> Price - {{ config('settings.currency_symbol').' '.$product->sale_price }} / Lb
                                        <del>{{ config('settings.currency_symbol').' '.$product->price }} / Lb</del>
                                    </a>
                                @else
                                    <a href="{{ route('product.show', $product->slug) }}" class="price"> Price - {{ config('settings.currency_symbol').' '.$product->price }} / Lb</a>
                                @endif
                            </p>

                                <div class="cart" style="cursor:pointer" onclick="location.href='{{ route('product.show', $product->slug) }}'">
                                    <a href="{{ route('product.show', $product->slug) }}">Buy Now</a>
                                </div>


                        </a>
                            <!--<div class="img-box">-->
                            <!--    <img src="{{ asset('public/storage/'.$product->image) }}">-->
                            <!--</div>-->
                            <!--<p class="detail">{{$product->name}}-->
                            <!--    @if ($product->sale_price != 0)-->
                            <!--    <a href="{{ route('product.show', $product->slug) }}" class="price"> Price - {{ config('settings.currency_symbol').' '.$product->sale_price }} / Lb-->
                            <!--        <del>{{ config('settings.currency_symbol').' '.$product->price }} / Lb</del>-->
                            <!--    </a>-->
                            <!--    @else-->
                            <!--        <a href="{{ route('product.show', $product->slug) }}" class="price"> Price- {{ config('settings.currency_symbol').' '.$product->price }} / Lb</a>-->
                            <!--    @endif-->
                            <!--</p>-->

                            <!--<div class="cart">-->
                            <!--    <a href="{{ route('product.show', $product->slug) }}">Buy Now</a>-->
                            <!--</div>-->
                        </div>
                    </div>
                    @empty
                        <p>No Products found in {{ $category->name }}.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>


    <!--=====  End of Category page content  ======-->
@stop
