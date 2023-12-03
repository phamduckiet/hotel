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
                        @if (auth()->user())
                            <a id="logout-btn" href="#" class="sign-in"><i class="fa fa-sign-out"
                                    aria-hidden="true"></i>Đăng xuất</a>
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
