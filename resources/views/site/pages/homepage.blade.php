@extends('site.app')
@section('title', 'Homepage')

@section('content')



    <!--=============================================
    =            Hero slider Area         =
    =============================================-->
@if(config('settings.banner')=='image')
    <div class="hero-slider-container mb-35">
        <!--=======  Slider area  =======-->

        @php
        $sliders = App\Models\Slider::all();
        @endphp

        <div class="hero-slider-one">
            <!--=======  hero slider item  =======-->
            @foreach($sliders as $slider)
            <div class="hero-slider-item" style="background-image: url({{asset('public/storage/'.$slider->image)}}); max-width: 100%;">
                <div class="slider-content d-flex flex-column justify-content-center align-items-center">
                    <h1>{{$slider->title}}</h1>
                    <p>{{$slider->subtitle}}</p>
                    <a href="{{$slider->link}}" class="slider-btn">{{$slider->button}}</a>
                </div>
            </div>
            @endforeach

            <!--=======  End of hero slider item  =======-->

        </div>

        <!--=======  End of Slider area  =======-->

    </div>

    <!--=====  End of Hero slider Area  ======-->
@else
    <!-- video slider-->

        <div class="container">
            <video autoplay muted loop id="myVideo">
                  <source src="{{asset('public/storage/'.config('settings.video'))}}" type="video/mp4">
            </video>

        </div>

       <!--video slider end -->

@endif

    <div class="features-boxed">
        <div class="container">
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-3 item">
                    <div class="box"><img src="{{asset('public/storage/'.config('settings.feature_icon_1'))}}" style="width: 97px;margin-top: -3px;">
                        <h3 class="name" style="margin-top: 8px;">{{config('settings.feature_title_1')}}</h3>
                        <p class="description">{{config('settings.feature_subtitle_1')}}<br><br></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3 item">
                    <div class="box"><img src="{{asset('public/storage/'.config('settings.feature_icon_2'))}}" style="width: 134px;margin-top: -6px;">
                        <h3 class="name">{{config('settings.feature_title_2')}}<br></h3>
                        <p class="description">{{config('settings.feature_subtitle_2')}}<br></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3 item">
                    <div class="box"><img src="{{asset('public/storage/'.config('settings.feature_icon_3'))}}" style="width: 107px;border-radius: 103px;">
                        <h3 class="name" style="margin-top: 5px;">{{config('settings.feature_title_3')}}<br></h3>
                        <p class="description">{{config('settings.feature_subtitle_3')}}<br></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3 item">
                    <div class="box"><img src="{{asset('public/storage/'.config('settings.feature_icon_4'))}}" style="width: 182px;margin-top: -15px;">
                        <h3 class="name">{{config('settings.feature_title_4')}}</h3>
                        <p class="description">{{config('settings.feature_subtitle_4')}}<br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #adbcdb; padding: 30px;">
        <div class="row no-gutters text-capitalize">
            <div class="col-sm-6 align-self-center">
                <div class="text-left">
                    <h2 class="text-center">{{config('settings.promo_text')}}</h2>
                </div>
            </div>
            <div class="col-sm-6 offset-0 justify-content-start align-items-start justify-content-lg-center">
                <div><img class="img-fluid" src="{{asset('public/storage/'.config('settings.promo_image'))}}"></div>
            </div>
        </div>
    </div>

    <!-- product slider-->
    <div class="container">
        <h1 style="text-align: center; font-size: 40px; margin-top: 50px; margin-bottom: -40px;">OUR PRODUCTS</h1>

    <div class="container">
        <div class="row catmain">
        @foreach($categories as $catg)
            <!-- block1 -->
            <div class="col-md-4 block1 hov-img-zoom pos-relative m-b-30">
                <a href="{{route('category.show',$catg->slug)}}">
                    <img style="height: 250px;" src="{{asset('public/storage/'.$catg->image)}}" alt="Beef/Veal">

                    <div class="block1-wrapbtn w-size2">
                        <!-- Button -->
                        <a href="{{route('category.show',$catg->slug)}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                            {{$catg->name}}
                        </a>
                    </div>
                </a>
            </div>
        @endforeach

        </div>
    </div>


    <!--Main Category End-->



        @foreach($categories as $catg)

        <div class="swiper-container">
            <h1 style="text-align: center; margin: 50px; cursor: pointer;"> <a href="{{route('category.show',$catg->slug)}}"> {{$catg->name}} </a></h1>
            <div class="swiper-wrapper">
                @foreach($catg->products as $product)
                <div class="swiper-slide">
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
                @endforeach


            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        @endforeach

    </div>

    <!--Video-->


  <div style="margin-top:30px; margin-bottom:-30px;" class="iframe-container container">
    <div style="height:30px;"></div>
    <iframe src="https://www.youtube.com/embed/h29qhlMR2gQ?autoplay=1&showinfo=0&rel=0&iv_load_policy=3&theme=light" frameborder="0">
    </iframe> </div>

    <style>
        .iframe-container{
          position: relative;
          width: 100%;
          padding-bottom: 56.25%;
        }
        .iframe-container iframe{
          position: absolute;
          left: 10%;
          width: 80%;
          height: 70%;
        }
    </style>

    <!--End Video-->


@stop
@push('scripts')
    <script>
        var appendNumber = 4;
        var prependNumber = 1;
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            centeredSlides: false,
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        document.querySelector('.prepend-2-slides').addEventListener('click', function (e) {
            e.preventDefault();
            swiper.prependSlide([
                '<div class="swiper-slide">Slide ' + (--prependNumber) + '</div>',
                '<div class="swiper-slide">Slide ' + (--prependNumber) + '</div>'
            ]);
        });
        document.querySelector('.prepend-slide').addEventListener('click', function (e) {
            e.preventDefault();
            swiper.prependSlide('<div class="swiper-slide">Slide ' + (--prependNumber) + '</div>');
        });
        document.querySelector('.append-slide').addEventListener('click', function (e) {
            e.preventDefault();
            swiper.appendSlide('<div class="swiper-slide">Slide ' + (++appendNumber) + '</div>');
        });
        document.querySelector('.append-2-slides').addEventListener('click', function (e) {
            e.preventDefault();
            swiper.appendSlide([
                '<div class="swiper-slide">Slide ' + (++appendNumber) + '</div>',
                '<div class="swiper-slide">Slide ' + (++appendNumber) + '</div>'
            ]);
        });

    </script>
    <!-- jQuery JS -->
@endpush


