

<!--=============================================
                   =            navigation menu         =
                   =============================================-->

<!-- navigation section -->
<div class="main-menu main-menu-other-homepage">
    <nav>
        <ul>
            <li><a href="{{route('site.pages.homepage')}}">Home</a></li>

            <li class="menu-item-has-children"><a href="#">Shop</a>
                <ul class="sub-menu">
                    @foreach($categories as $cat)
                        @foreach($cat->items as $category)

                            @if ($category->items->count() > 0)
                                <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>
                            @else
                                <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>
                            @endif
                        @endforeach
                    @endforeach
                </ul>
            </li>

            @guest
                                <li><a href="{{route('login')}}">Log In</a></li>
                                <li><a href="{{route('register')}}">Register</a></li>
                            @else
                                <li><a href="{{route('account.index')}}">My Account</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
            <li><a href="{{route('contact-us')}}">Contact Us</a></li>
        </ul>
    </nav>
</div>
<!-- end of navigation section -->

<!--=====  End of navigation menu  ======-->


</div>
<div class="col-12">
    <!-- Mobile Menu -->
    <div class="mobile-menu d-block d-lg-none"></div>
</div>
</div>
</div>

<!--=============================================
=            navigation menu         =
=============================================-->

<div class="home-other-navigation-menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- navigation section -->
                <div class="main-menu">
                    <nav>
                        <ul>
                            <li><a href="{{route('site.pages.homepage')}}">Home</a></li>

                            <li class="menu-item-has-children"><a href="#">Shop</a>
                                <ul class="sub-menu">
                                    @foreach($categories as $cat)
                                        @foreach($cat->items as $category)
                                            @if ($category->items->count() > 0)
                                                <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>
                                            @else
                                                <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>
                            </li>
                            @guest
                                <li><a href="{{route('login')}}">Log In</a></li>
                                <li><a href="{{route('register')}}">Register</a></li>
                            @else
                                <li><a href="{{route('account.index')}}">My Account</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest

                            <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- end of navigation section -->
            </div>
        </div>
    </div>
</div>

<!--=====  End of navigation menu  ======-->

