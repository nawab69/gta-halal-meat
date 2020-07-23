
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
	=            Footer         =
	=============================================-->

<footer>
    <!--=======  newsletter section  =======-->

    <div class="newsletter-section pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 mb-sm-20 mb-xs-20">
                    <!--=======  newsletter title =======-->

                    <div class="newsletter-title">
                        <h1>
                            <img src="{{asset('public/frontend/images/icon-newsletter.png')}}" alt="">
                            Send Newsletter
                        </h1>
                    </div>

                    <!--=======  End of newsletter title  =======-->
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <!--=======  subscription-form wrapper  =======-->

                    <div class="subscription-form-wrapper d-flex flex-wrap flex-sm-nowrap">
                        <p class="mb-xs-20">Sign up for our newsletter to receive updates and Exclusive offers</p>
                        <div class="subscription-form">
                            <form action="{{route('subscribe')}}" method="post" class="mc-form subscribe-form">
                                @csrf
                                <input type="email" name="email" placeholder="Your email address">
                                <button type="submit"> subscribe!</button>
                            </form>

                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>

                    <!--=======  End of subscription-form wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of newsletter section  =======-->

    <!--=======  social contact section  =======-->

    <div class="social-contact-section pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 order-2 order-md-2 order-sm-2 order-lg-1">
                    <!--=======  social media links  =======-->

                    <div class="social-media-section">
                        <h2>Follow us</h2>
                        <div class="social-links">
                            <a class="facebook" href="{{config('settings.social_facebook')}}" data-tooltip="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a class="instagram" href="{{config('settings.social_instagram')}}" data-tooltip="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>

                    <!--=======  End of social media links  =======-->

                </div>
                <div class="col-lg-8 col-md-12 order-1 order-md-1 order-sm-1 order-lg-2  mb-sm-50 mb-xs-50">
                    <!--=======  contact summery  =======-->

                    <div class="contact-summery">
                        <h2>Contact us</h2>

                        <!--=======  contact segments  =======-->

                        <div class="contact-segments d-flex justify-content-between flex-wrap flex-lg-nowrap">
                            <!--=======  single contact  =======-->


                            <!--=======  End of single contact  =======-->
                            <!--=======  single contact  =======-->

                            <div class="single-contact d-flex mb-xs-20">
                                <div class="icon">
                                    <span class="icon_mobile"></span>
                                </div>
                                <div class="contact-info">
                                    <p>Phone: <span>{{config('settings.phone')}}</span></p>
                                </div>
                            </div>

                            <!--=======  End of single contact  =======-->
                            <!--=======  single contact  =======-->

                            <div class="single-contact d-flex">
                                <div class="icon">
                                    <span class="icon_mail_alt"></span>
                                </div>
                                <div class="contact-info">
                                    <p>Email: <span>{{config('settings.default_email_address')}}</span></p>
                                </div>
                            </div>

                            <!--=======  End of single contact  =======-->
                        </div>

                        <!--=======  End of contact segments  =======-->



                    </div>

                    <!--=======  End of contact summery  =======-->

                </div>
            </div>
        </div>
    </div>

    <!--=======  End of social contact section  =======-->

    <!--=======  footer navigation  =======-->

    <div class="footer-navigation-section pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">
                    <!--=======  single navigation section  =======-->

                    <div class="single-navigation-section">
                        <h3 class="nav-section-title">PAGES</h3>
                        <ul>
                            <li> <a href="{{route('site.pages.homepage')}}">Home</a>
                            @php
                                $cats = App\Models\Category::where('id', '!=', 1)->get()
                            @endphp
                            @foreach($cats as $catg)
                                        <li><a href="{{ route('category.show', $catg->slug) }}">{{ $catg->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <!--=======  End of single navigation section  =======-->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">
                    <!--=======  single navigation section  =======-->

                    <div class="single-navigation-section">
                        <h3 class="nav-section-title">MY ACCOUNT</h3>
                        <ul>
                            @guest
                            <li> <a href="{{route('login')}}">My Account</a></li>
                            @else
                            <li> <a href="{{route('account.index')}}">My Account</a></li>
                            @endguest
                            <li> <a href="{{route('checkout.cart')}}">Shopping Cart</a></li>
                        </ul>
                    </div>

                    <!--=======  End of single navigation section  =======-->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">
                    <!--=======  single navigation section  =======-->

                    <div class="single-navigation-section">
                        <h3 class="nav-section-title">TERMS OF SERVICES</h3>
                        <ul>
                            <li> <a href="{{route('privacy')}}">Privacy Policy</a></li>
                            <li> <a href="{{route('terms')}}">Terms and Conditions</a></li>
                            <li> <a href="{{route('faq')}}">FAQ's</a></li>
                            <li> <a href="{{route('refund')}}">Refund policy</a></li>
                        </ul>
                    </div>

                    <!--=======  End of single navigation section  =======-->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <!--=======  single navigation section  =======-->

                    <div class="single-navigation-section">
                        <h3 class="nav-section-title">GTA HalalMeat Info</h3>
                        <ul>
                            <li> <a href="{{route('halalcert')}}">VIEW VENDOR HALAL CERTIFICATION</a></li>
                            <li> <a href="{{route('about')}}">ABOUT US</a></li>
                        </ul>
                    </div>

                    <!--=======  End of single navigation section  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of footer navigation  =======-->


    <!--=======  copyright section  =======-->

    <div class="copyright-section pt-35 pb-35">
        <div class="container">
            <div class="row align-items-md-center align-items-sm-center">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center text-md-left">
                    <!--=======  copyright text	  =======-->

                    <div class="copyright-segment">
                        <p class="copyright-text">&copy; 2020 GTA Halal Meat</a>. All Rights Reserved</p>
                        <p class="copyright-text"> Developed by <a href="https://devpolash.com">Piarujjaman Polash</a></p>
                    </div>

                    <!--=======  End of copyright text	  =======-->

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <!--=======  payment info  =======-->

                    <div class="payment-info text-center text-md-right">
                        <p>We Accept <img src="{{asset('public/frontend/images/payment-icon.png')}}" class="img-fluid" alt=""></p>
                    </div>

                    <!--=======  End of payment info  =======-->

                </div>
            </div>
        </div>
    </div>

    <!--=======  End of copyright section  =======-->
</footer>

<!--=====  End of Footer  ======-->


<!-- scroll to top  -->
<a href="#" class="scroll-top"></a>
<!-- end of scroll to top -->
