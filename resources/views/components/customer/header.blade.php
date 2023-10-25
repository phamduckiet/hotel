<!-- Top header start -->
<header class="top-header top-header-3 hidden-xs" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                <div class="list-inline">
                    <a href="tel:1-8X0-666-8X88"><i class="fa fa-phone"></i>0399907777</a>
                    <a href="tel:info@themevessel.com"><i class="fa fa-envelope"></i>k_hotel@gmail.com</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                <ul class="social-list clearfix pull-right">
                    <li>
                        <a href="#" class="facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="google">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rss">
                            <i class="fa fa-rss"></i>
                        </a>
                    </li>
                    <li>
                        @if (auth()->user())
                            <a id="logout-btn" href="#" class="sign-in"><i class="fa fa-sign-out"
                                    aria-hidden="true"></i>
                                {{ __('messages.sign_out') }}</a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        @else
                            {{-- <a href="{{ route('login') }}" class="sign-in"> <i class="fa fa-user"></i> Log In /
                                Register</a> --}}
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Top header end -->
