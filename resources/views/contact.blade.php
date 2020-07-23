@extends('site.app')
@section('title', 'Contact Us')
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
                            <li class="active">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of breadcrumb area  ======-->



    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    @if (\Session::has('failure'))
        <div class="alert alert-danger">
            <p>{{ \Session::get('failure') }}</p>
        </div><br />
    @endif



    <!--=============================================
	=            Contact page content         =
	=============================================-->

    <div class="page-content mb-50">

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 mb-xs-35">
                    <!--=======  contact page side content  =======-->

                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">Contact Us</h3>

                        <!--=======  single contact block  =======-->

                        <div class="single-contact-block">
                            <h4><img src="{{asset('public/frontend/images/icons/contact-icon2.png')}}" alt=""> Phone</h4>
                            <p>Phone: {{config('settings.phone')}}</p>
                        </div>

                        <!--=======  End of single contact block  =======-->

                        <!--=======  single contact block  =======-->

                        <div class="single-contact-block">
                            <h4><img src="{{asset('public/frontend/images/icons/contact-icon3.png')}}" alt=""> Email</h4>
                            <p>support@gtahalalmeat.com</p>
                        </div>

                        <!--=======  End of single contact block  =======-->
                    </div>

                    <!--=======  End of contact page side content  =======-->

                </div>
                <div class="col-lg-9 col-md-8 pl-100 pl-xs-15">
                    <!--=======  contact form content  =======-->

                    <div class="contact-form-content">
                        <h3 class="contact-page-title">Tell Us Your Message</h3>

                        <div class="contact-form">
                            <form  id="contact-form" action="{{route('contactus.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Your Name <span class="required">*</span></label>
                                    <input type="text" name="name" value="{{old('name')}}" id="customername" required>
                                </div>
                                <div class="form-group">
                                    <label>Your Email <span class="required">*</span></label>
                                    <input type="email" value="{{old('email')}}" name="email" id="customerEmail" required>
                                </div>
                                <div class="form-group">
                                    <label>Subject <span class="required">*</span></label>
                                    <input type="text" value="{{old('subject')}}" name="subject" id="contactSubject" required>
                                </div>
                                <div class="form-group">
                                    <label>Your Message <span class="required">*</span></label>
                                    <textarea name="message" id="contactMessage" required>{{old('message')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" value="submit" id="submit" class="contact-form-btn" name="submit">send</button>
                                </div>
                            </form>
                        </div>
                        <p class="form-messege pt-10 pb-10 mt-10 mb-10"></p>
                    </div>

                    <!--=======  End of contact form content =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of Contact page content  ======-->


@stop
