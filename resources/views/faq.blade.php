@extends('site.app')
@section('title', 'Faq')
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
                            <li class="active">FAQ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of breadcrumb area  ======-->


    <!--=============================================
    =            FAQ page content         =
    =============================================-->

    <div class="faq-area page-content mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-wrapper">

                        <div id="accordion">

                            @forelse($faqs as $faq)
                            <div class="card">
                                <div class="card-header" id="heading{{$faq->id}}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$faq->id}}"
                                                aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                                            {{$faq->ques}} <span> <i class="fa fa-chevron-down"></i>
												<i class="fa fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="heading{{$faq->id}}"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>{{$faq->ans}}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <h2>No Faq Found</h2>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--=====  End of FAQ page content  ======-->

@stop
