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
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('logo.png')}}" alt="logo">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                <ul class="nav navbar-nav">
                    <li class="dropdown @if (Route::is('home')) active @endif">
                        <a href="{{ route('home') }}">
                            Trang chủ
                        </a>
                    </li>
                    <li class="dropdown @if (Route::is('my_bookings.*')) active @endif">
                        <a href="{{ route('my_bookings.index') }}">
                            Đặt phòng
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('about.view') }}">
                            Giới Thiệu
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
                    <li>
                        @if (auth()->user())
                            <div style="display:flex;align-items:center;gap:10px;font-size:15px;font-weight:600;margin-top:20px;">
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
                            {{-- <a class="btn-navbar btn btn-sm btn-theme-sm-outline btn-round" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                            <a class="btn-navbar btn btn-sm btn-theme-sm-outline btn-round" href="{{ route('register') }}">{{ __('messages.create_account') }}</a> --}}
                            <div>
                                <a class="btn-navbar btn btn-sm btn-theme-sm-outline btn-round" href="{{ route('login') }}">Đăng Nhập</a>
                                <a class="btn-navbar btn btn-sm btn-theme-sm-outline btn-round" href="{{ route('register') }}">Đăng Ký</a>
                            </div>
                            @endif
                    </li>
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
