@extends('site.app')
@section('title', 'Search Result')
@section('content')


    <!--=============================================
	=            Cateory page content               =
	=============================================-->

    <div class="faq-area page-content mb-50">
        <div style="align-items: center;" class="container">

            <h1 style="text-align: center; margin: 40px;"> Search Result </h1>
            <p style="text-align: center; margin: 40px;">{{$products->count()}} results found for {{$query}}</p>
            <div style="text-align: center; align-items: center;">
                <div class="subch">

                    @forelse($products as $product)
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
                        </div>
                    </div>
                    @empty
                        <p>No Products found in.</p>
                    @endforelse
                        <div class="row justify-content-center mt-5">{{ $products->links() }}</div>
                </div>
            </div>
        </div>
    </div>


    <!--=====  End of Category page content  ======-->
@stop
