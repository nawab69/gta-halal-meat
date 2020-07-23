
@extends('site.app')
@section('title', 'About Us')
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
                            <li class="active">About Us </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of breadcrumb area  ======-->

    <div class="faq-area page-content mb-50">
        <div class="container">
            <h1 style="text-align: center; margin-top: 20px;"> About Us </h1>
            <div class="card-body">
                @php
                    $text = App\Models\Page::where('name','about')->first()->text;
                @endphp
                <p>{!! (new Parsedown)->text($text) !!}</p>
            </div>
        </div>
    </div>


@stop
