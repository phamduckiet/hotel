<!-- Main header start -->
<header class="main-header main-header-4">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.html" class="logo">
                    <img src="{{ asset('hotel-alpha/img/logos/logo.png')}}" alt="logo">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                <ul class="nav navbar-nav">
                    <li class="dropdown active">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Home<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.html">Home 1</a></li>
                            <li><a href="index-2.html">Home 2</a></li>
                            <li><a href="index-3.html">Home 3</a></li>
                            <li><a href="index-4.html">Home 4</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Rooms<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="rooms-col-1.html">1 Column</a></li>
                            <li><a href="rooms-col-2.html">2 Column</a></li>
                            <li><a href="rooms-col-3.html">3 Column</a></li>
                            <li><a href="rooms-col-4.html">4 Column</a></li>
                            <li><a href="rooms-details.html">Rooms Details</a></li>
                            <li><a href="rooms-details-2.html">Rooms Details 2</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Pages<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a tabindex="0">Gallery</a>
                                <ul class="dropdown-menu">
                                    <li><a href="gallery-3column.html">Gallery 3 Column</a></li>
                                    <li><a href="gallery-4column.html">Gallery 4 Column</a></li>
                                    <li><a href="gallery-masonry.html">Gallery Masonry</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a tabindex="0">About Us</a>
                                <ul class="dropdown-menu">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="about-2.html">About Us 2</a></li>
                                </ul>
                            </li>
                            <li><a href="booking-system.html">Booking System</a></li>
                            <li class="dropdown-submenu">
                                <a tabindex="0">Staff</a>
                                <ul class="dropdown-menu">
                                    <li><a href="staff.html">Staff</a></li>
                                    <li><a href="staff-2.html">Staff 2</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a tabindex="0">Events</a>
                                <ul class="dropdown-menu">
                                    <li><a href="events.html">Events</a></li>
                                    <li><a href="events-right-sidebar.html">Events Right Sidebar</a></li>
                                    <li><a href="events-details.html">Events Details</a></li>
                                </ul>
                            </li>
                            <li><a href="pricing-tables.html">Pricing Tables</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                            <li><a href="forgot-password.html">Forgot Password</a></li>
                            <li><a href="404.html">404 Error</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Contact<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="contact-2.html">Contact 2</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Blog<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                            <li><a href="blog-full-width.html">Blog Fullwidth</a></li>
                            <li><a href="blog-creative.html">Blog Creative</a></li>
                            <li><a href="blog-details.html">Blog Detail</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
                    <li style="margin-top:20px;">
                        @if (auth()->user())
                            <div style="display:flex;align-items:center;gap:10px;font-size:15px;font-weight:600">
                                <img src="{{ Avatar::create(auth()->user()?->name)->setFontSize(40)->toBase64() }}" style="width:40px;"/>
                                <div>
                                    <div>
                                        {{ auth()->user()?->name }}
                                    </div>
                                    <div style="font-size:12px;font-weight:400;color:#7D7C7C;">
                                        {{ auth()->user()?->email }}
                                    </div>
                                </div>
                            </div>
                        @else
                            <a class="btn-navbar btn btn-sm btn-theme-sm-outline btn-round" href="{{ route('register') }}">{{ __('messages.create_account') }}</a>
                        @endif
                    </li>
                    <li>
                        <a id="header-search-btn" class="btn-navbar search-icon"><i class="fa fa-search"></i></a>
                    </li>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
            <!-- /.container -->
        </nav>

        <div class="header-search animated fadeInDown">
            <form class="form-inline">
                <input type="text" class="form-control" id="searchKey" placeholder="Search...">
                <div class="search-btns">
                    <button type="submit" class="btn btn-default">Search</button>
                </div>
            </form>
        </div>
    </div>
</header>
<!-- Main header end -->