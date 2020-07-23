@extends('admin.app')

@section('title') {{ $pageTitle }} @endsection

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-cogs"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#about" data-toggle="tab">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#privacy" data-toggle="tab">Privacy Policy</a></li>
                    <li class="nav-item"><a class="nav-link" href="#refund" data-toggle="tab">Refund Policy</a></li>
                    <li class="nav-item"><a class="nav-link" href="#terms" data-toggle="tab">Terms and Condition</a></li>
                    <li class="nav-item"><a class="nav-link" href="#halalcert" data-toggle="tab">Halal Certificate</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="about">
                    @include('admin.pages.includes.about')
                </div>
                <div class="tab-pane fade" id="privacy">
                    @include('admin.pages.includes.privacy')
                </div>
                <div class="tab-pane fade" id="refund">
                    @include('admin.pages.includes.refund')
                </div>
                <div class="tab-pane fade" id="terms">
                    @include('admin.pages.includes.terms')
                </div>
                <div class="tab-pane fade" id="halalcert">
                    @include('admin.pages.includes.halalcert')
                </div>
            </div>
        </div>
    </div>
    
@push('scripts')
<script>
var simplemde = new SimpleMDE();
var simplemde2 = new SimpleMDE({autofocus: true, element: document.getElementById("privacy_us") });
var simplemde3 = new SimpleMDE({autofocus: true, element: document.getElementById("refund_us") });
var simplemde4 = new SimpleMDE({autofocus: true, element: document.getElementById("terms_us") });
var simplemde5 = new SimpleMDE({autofocus: true, element: document.getElementById("halal_us") });
</script>
@endpush

@endsection

