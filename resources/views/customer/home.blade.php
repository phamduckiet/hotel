@extends('layouts.customer')

@section('content')
    <!-- Banner start -->
    <div class="banner banner-max-height">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="hotel-alpha/img/banner/banner-slider-3.jpg" alt="banner-slider-3">
                    <div class="carousel-caption banner-slider-inner banner-top-align">
                        <div class="banner-content text-center">
                            <h1 data-animation="animated fadeInDown delay-05s"><span>Chào mừng đến với</span> K Hotel</h1>
                            <p data-animation="animated fadeInUp delay-1s">Khách sạn K Hotel là một điểm đến lý tưởng cho
                                những ai tìm kiếm sự hoàn hảo và tiện nghi tại thành phố này. Với vị trí thuận lợi, K Hotel
                                đặt tại trung tâm thị trấn, gần các điểm tham quan nổi tiếng, cửa hàng mua sắm, và nhà hàng
                                tuyệt vời. Khách sạn chú trọng đến sự thoải mái của khách hàng, với phòng ốc thoải mái, dịch
                                vụ chu đáo, và tiện nghi hiện đại. K Hotel cung cấp một trải nghiệm lưu trú đáng nhớ và là
                                điểm dừng chân hoàn hảo cho du khách khám phá khu vực này.</p>
                            {{-- <a href="#" class="btn btn-md btn-theme" data-animation="animated fadeInUp delay-15s">Get
                                Started Now</a>
                            <a href="#" class="btn btn-md border-btn-theme"
                                data-animation="animated fadeInUp delay-15s">Learn More</a> --}}
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="hotel-alpha/img/banner/banner-slider-2.jpg" alt="banner-slider-2">
                    <div class="carousel-caption banner-slider-inner banner-top-align">
                        <div class="banner-content text-center">
                            <h1 data-animation="animated fadeInDown delay-05s"><span>Chào mừng đến với</span> K Hotel</h1>
                            <p data-animation="animated fadeInUp delay-1s">Khách sạn K Hotel là một điểm đến lý tưởng cho
                                những ai tìm kiếm sự hoàn hảo và tiện nghi tại thành phố này. Với vị trí thuận lợi, K Hotel
                                đặt tại trung tâm thị trấn, gần các điểm tham quan nổi tiếng, cửa hàng mua sắm, và nhà hàng
                                tuyệt vời. Khách sạn chú trọng đến sự thoải mái của khách hàng, với phòng ốc thoải mái, dịch
                                vụ chu đáo, và tiện nghi hiện đại. K Hotel cung cấp một trải nghiệm lưu trú đáng nhớ và là
                                điểm dừng chân hoàn hảo cho du khách khám phá khu vực này.</p>
                            {{-- <a href="#" class="btn btn-md btn-theme" data-animation="animated fadeInUp delay-15s">Get
                                Started Now</a>
                            <a href="#" class="btn btn-md border-btn-theme"
                                data-animation="animated fadeInUp delay-15s">Learn More</a> --}}
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="hotel-alpha/img/banner/banner-slider-1.jpg" alt="banner-slider-1">
                    <div class="carousel-caption banner-slider-inner banner-top-align">
                        <div class="banner-content text-center">
                            <h1 data-animation="animated fadeInDown delay-05s"><span>Chào mừng đến với</span> K Hotel</h1>
                            <p data-animation="animated fadeInUp delay-1s">Khách sạn K Hotel là một điểm đến lý tưởng cho
                                những ai tìm kiếm sự hoàn hảo và tiện nghi tại thành phố này. Với vị trí thuận lợi, K Hotel
                                đặt tại trung tâm thị trấn, gần các điểm tham quan nổi tiếng, cửa hàng mua sắm, và nhà hàng
                                tuyệt vời. Khách sạn chú trọng đến sự thoải mái của khách hàng, với phòng ốc thoải mái, dịch
                                vụ chu đáo, và tiện nghi hiện đại. K Hotel cung cấp một trải nghiệm lưu trú đáng nhớ và là
                                điểm dừng chân hoàn hảo cho du khách khám phá khu vực này.</p>
                            {{-- <a href="#" class="btn btn-md btn-theme" data-animation="animated fadeInUp delay-15s">Get
                                Started Now</a>
                            <a href="#" class="btn btn-md border-btn-theme"
                                data-animation="animated fadeInUp delay-15s">Learn More</a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="slider-mover-left" aria-hidden="true">
                    <i class="fa fa-angle-left"></i>
                </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="slider-mover-right" aria-hidden="true">
                    <i class="fa fa-angle-right"></i>
                </span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Search area box start -->
        <div class="search-area-box search-area-box-4 search-area-box-5 hidden-xs hidden-sm">
            <div class="container">
                <div class="search-contents search-contents-3">
                    <form method="GET" action="{{ route('home') }}">
                        <div class="row search-your-details">
                            <div class="col-md-12">
                                <div class="search-your-rooms">
                                    <h4>Tìm kiếm phòng</h4>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    @php
                                        $dateParts = explode('-', request('daterange') ?? '');

                                        $checkin = null;
                                        $checkout = null;

                                        if (count($dateParts) === 2) {
                                                $checkin = Carbon\Carbon::createFromFormat('d/m/Y', trim($dateParts[0]))->format('Y-m-d');
                                                $checkout = Carbon\Carbon::createFromFormat('d/m/Y', trim($dateParts[1]))->format('Y-m-d');
                                        }
                                    @endphp
                                    <input type="text" name="daterange" id="daterange-input" autocomplete="off"
                                        placeholder="Nhận phòng - Trả phòng" value="{{ request('daterange') }}" />
                                    <input type="hidden" name="checkin" id="checkin-input" value="{{ $checkin }}" />
                                    <input type="hidden" name="checkout" id="checkout-input" value="{{ $checkout }}" />
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="btn-default" name="adults" value="{{ request('adults') }}"
                                        placeholder="Người lớn">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="btn-default" name="children"
                                        value="{{ request('children') }}" placeholder="Trẻ em">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="btn-default" value="{{ request('room_total') }}"
                                        name="room_total" placeholder="Số lượng phòng">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-6">
                                <div class="form-group">
                                    <button type="submit" class="search-button btn-blocks">Tìm kiếm</button>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-6">
                                <div class="form-group">
                                    <a href="{{ route('home') }}">
                                        <button type="button" class="btn btn-grey" style="padding:13px 0;">Xóa lọc</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Search area box end -->
    </div>
    <!-- Banner end -->

    <!-- Hotel section start -->
    <div class="content-area-13 hotel-section">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Danh sách các phòng</h1>
                <p>Hãy chọn cho bạn một căn phòng phù hợp</p>
            </div>
            <div class="row">
                @foreach ($roomTypes as $roomType)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <a href="#">
                            <div class="hotel-box-list-2 clearfix">
                                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 col-pad">
                                    <img src="{{ $roomType->avatar_link }}" alt="img-9"
                                        class="room-type-avatar-img img-responsive room-detail-btn"
                                        data-url="{{ route('room.detail', ['room_type' => $roomType->id]) }}">
                                </div>
                                <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 detail">
                                    <div class="heading">
                                        <div class="title">
                                            <h3>
                                                <a class="room-detail-btn"
                                                    data-url="{{ route('room.detail', ['room_type' => $roomType->id]) }}">{{ $roomType->name }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="room-description-container">
                                        <p>{!! $roomType->summary !!}</p>
                                    </div>
                                    @if (!$roomType->is_available)
                                        <div class="read-more-btn">(Hết phòng)</div>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Hotel section end -->

    <!-- About Institute bg start -->
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
    <!-- About Institute bg end -->

    <!-- Our facilties section start -->
    <div class="our-facilties-section content-area-5">
        <div class="overlay">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1>CÁC CƠ SỞ CỦA CHÚNG TÔI</h1>
                    <p>Kiểm tra cơ sở vật chất khách sạn của chúng tôi</p>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                        <div class="services-box-2 media">
                            <div class="media-left">
                                <i class="flaticon-school-call-phone-reception"></i>
                            </div>
                            <div class="media-body">
                                <h3>Lễ tân phụ vụ 24/24</h3>
                                <p>Đội ngũ trên 100 nhân viên xoay ca nhau đảm bảo phục vụ trong 24/24</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                        <div class="services-box-2 media">
                            <div class="media-left">
                                <i class="flaticon-room-service"></i>
                            </div>
                            <div class="media-body">
                                <h3>Dịch vụ phòng</h3>
                                <p>Giặc sấy, ăn khuya, xông hơi,...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                        <div class="services-box-2 media">
                            <div class="media-left">
                                <i class="flaticon-graph-line-screen"></i>
                            </div>
                            <div class="media-body">
                                <h3>TV màn hình phẳng</h3>
                                <p>Kết nối truyền hình cáp , Netflix , K+, FPT,...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                        <div class="services-box-2 media">
                            <div class="media-left">
                                <i class="flaticon-weightlifting"></i>
                            </div>
                            <div class="media-body">
                                <h3>Gym</h3>
                                <p>Có phòng tập gym riêng trên sân thượng cho bạn luyện tập</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                        <div class="services-box-2 media">
                            <div class="media-left">
                                <i class="flaticon-parking"></i>
                            </div>
                            <div class="media-body">
                                <h3>Bãi đậu xe miễn phí</h3>
                                <p>Khuôn viên đậu đỗ xe rộng rãi thoả mái</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                        <div class="services-box-2 media">
                            <div class="media-left">
                                <i class="flaticon-wifi-connection-signal-symbol"></i>
                            </div>
                            <div class="media-body">
                                <h3>Free Wi-Fi</h3>
                                <p>Chúng tôi đã lắp đặt hệ thống truy cập internet tốc độ cao</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our facilties section end -->

    <!-- Counters strat -->
    <div class="counters">
        <h1>Thống kê khách sạn</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 bordered-right">
                    <div class="counter-box">
                        <h1 class="counter">967</h1>
                        <h5>Khách đặt phòng</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 bordered-right">
                    <div class="counter-box">
                        <h1 class="counter">577</h1>
                        <h5>Phòng đặt</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 bordered-right">
                    <div class="counter-box">
                        <h1 class="counter">1398</h1>
                        <h5>Thành viên lưu trú</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="counter-box counter-box-2">
                        <h1 class="counter">376</h1>
                        <h5>Bữa ăn được phục vụ</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counters end -->

    <!-- Testimonial secion start -->
    <div class="testimonials-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div id="carouse3-example-generic" class="carousel slide" data-ride="carousel">
                            <h1>Nhân viên của chúng tôi</h1>
                            <div class="carousel-inner" role="listbox">
                                @foreach ($users as $key => $user)
                                    <div class="item content @if ($key === 0) active @endif clearfix">
                                        <div class="item-inner">
                                            <div class="text">
                                                <sup>
                                                    <i class="fa fa-quote-left"></i>
                                                </sup>
                                                Lorem ipsum dolor sit amet, nemore facete quo cu, sumo tincidunt pri ex, usu
                                                ubique percipitur ea. Ut fugit quaestio Lorem ipsum dolor sit amet, nemore
                                                facete quo cu, sumo tincidunt pri ex, usu ubique percipitur ea. Ut fugit
                                                quaestio
                                                <sub>
                                                    <i class="fa fa-quote-right"></i>
                                                </sub>
                                            </div>
                                            <div class="avatar">
                                                <img src="hotel-alpha/img/testimonial/avatar-2.jpg" alt="avatar-2">
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
    <!-- Testimonial secion end -->
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        .room-type-avatar-url {
            height: 173px !important;
        }

        @media screen and (max-width: 768px) {
            .room-type-avatar-url {
                height: 173px !important;
            }
        }

        #daterange-input {
            width: 100%;
            height: 40px;
            border: unset;
            padding-left: 15px;
        }

        .daterangepicker td.active,
        .daterangepicker td.active:hover {
            background-color: #3ac4fa !important;
        }
    </style>
@endpush

@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('resources/js/customer/home.js') }}"></script>
@endpush
