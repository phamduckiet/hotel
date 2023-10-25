@extends('layouts.customer')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Giới thiệu về chúng tôi</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Giới thiệu</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Rooms section start -->
    <div class="rooms-section content-area">
        <div class="container">
            <div class="about-institute-bg">
                <div class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="hotels-detail-slider simple-slider">
                                    <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-outer">
                                            <!-- Carousel inner -->
                                            <div class="carousel-inner">
                                                <div class="item">
                                                    <img src="hotel-alpha/img/about/about-3.jpg" class="img-responsive"
                                                        alt="about-3">
                                                </div>
                                                <div class="item active left">
                                                    <img src="hotel-alpha/img/about/about-1.jpg" class="img-responsive"
                                                        alt="about-1">
                                                </div>
                                                <div class="item next left">
                                                    <img src="hotel-alpha/img/about/about-2.jpg" class="img-responsive"
                                                        alt="about-2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="about-text">
                                    <!-- title -->
                                    <div class="main-title-2">
                                        <h1><span>Thông tin về</span> K Hotel</h1>
                                    </div>
                                    <!-- paragraph -->
                                    <p>Chào mừng bạn đến với điểm dừng đầy phong cách và tiện nghi - Khách Sạn K Hotel! <br>
                                        Tận hưởng giấc ngủ êm ái trong phòng tiện nghi với trang thiết bị hiện đại. Không gian thoải
                                        mái và sáng sủa tạo nên trải nghiệm độc đáo.<br>
                                        Thực đơn đa dạng, hương vị tuyệt hảo tại nhà hàng của chúng tôi sẽ làm hài lòng mọi khẩu
                                        vị.<br>
                                        Thư giãn tại bể bơi hoặc tận hưởng liệu pháp spa đỉnh cao tại spa chuyên nghiệp của chúng
                                        tôi.<br>
                                        Gần trung tâm thành phố, chúng tôi thuận lợi cho cả việc tham quan và kinh doanh.<br>
                                        Đối với doanh nhân, chúng tôi có các phòng hội nghị và dịch vụ chuyên nghiệp để hỗ trợ cuộc
                                        họp của bạn.<br>
                                        Hãy đặt phòng ngay hôm nay để trải nghiệm dịch vụ và không gian tuyệt vời tại Khách Sạn
                                        Luminous. Chúng tôi sẽ biến kỳ nghỉ của bạn thành một kỷ niệm đáng nhớ!<br>
                                    </p>
                                    <!-- ul -->
                                    {{-- <ul class="clearfix">
                                        <li>
                                            <i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet
                                        </li>
                                        <li>
                                            <i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet
                                        </li>
                                        <li>
                                            <i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet
                                        </li>
                                        <li>
                                            <i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet
                                        </li>
                                        <li>
                                            <i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet
                                        </li>
                                        <li>
                                            <i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet
                                        </li>
                                    </ul>
                                    <!-- btn -->
                                    <a href="about.html" class="btn btn-sm btn-theme">Read More</a> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="testimonials-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div id="carouse3-example-generic" class="carousel slide" data-ride="carousel">
                            <h1>Đội ngũ nhân viên</h1>
                            <div class="carousel-inner" role="listbox">
                                @foreach ($users as $key => $user)
                                    <div class="item content @if ($key === 0) active @endif clearfix">
                                        <div class="item-inner">
                                            <div class="text">

                                                {{ $user->role }}

                                            </div>
                                            <div class="avatar">
                                                <img src="{{ $user->avatar ? $user->avatar_link : asset('hotel-alpha/img/testimonial/avatar-2.jpg') }}"
                                                    alt="avatar-2">
                                            </div>
                                            <h4>{{ $user->name }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#carouse3-example-generic" role="button"
                                data-slide="prev">
                                <span class="slider-mover-left t-slider-l" aria-hidden="true">
                                    <i class="fa fa-angle-left"></i>
                                </span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carouse3-example-generic" role="button"
                                data-slide="next">
                                <span class="slider-mover-right t-slider-r" aria-hidden="true">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms  section end -->
@endsection
