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
                            {{-- <div class="col-md-1 col-sm-1 col-xs-6">
                                <div class="form-group">
                                    <a href="{{ route('home') }}">
                                        <button type="button" class="btn btn-grey" style="padding:13px 0;">Xóa lọc</button>
                                    </a>
                                </div>
                            </div> --}}
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
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="3, 2, 4">
                        <div class="hotel-box" style="min-height:395px;">
                            <!--header -->
                            <div class="header clearfix">
                                <img src="{{ $roomType->avatar_link }}" alt="img-9"
                                    class="room-type-avatar-img img-responsive room-detail-btn"
                                    data-url="{{ route('room.detail', ['room_type' => $roomType->id]) }}"
                                    style="height:193px;">
                            </div>
                            <!-- Detail -->
                            <div class="detail clearfix">
                                <h3>
                                    <a
                                        href="{{ route('room.detail', ['room_type' => $roomType->id]) }}">{{ $roomType->name }}</a>
                                </h3>
                                <h5 class="location">
                                    @if (!$roomType->is_available)
                                        <div class="read-more-btn">(Hết phòng)</div>
                                    @endif
                                </h5>
                                <p>{!! $roomType->summary !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Hotel section end -->

    <!-- About Institute bg start -->

    <!-- About Institute bg end -->

    <!-- Our facilties section start -->
    <div class="our-facilties-section content-area-5">
        <div class="overlay">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1>CÁC DỊCH VỤ CỦA CHÚNG TÔI</h1>
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

    <!-- Google map start -->
    <div class="section">
        <div class="map">
            <div id="map" class="google-map"></div>
        </div>
    </div>
    <!-- Google map end -->
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
        .google-map {
            height: 500px !important;
        }
    </style>
@endpush

@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('resources/js/customer/home.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA68iSTxodYVgy9wew27QtIisJ0vVafxJ0"></script>
    <script>
        function LoadMap(propertes) {
            var defaultLat = 16.032764;
            var defaultLng = 108.221992;
            var mapOptions = {
                center: new google.maps.LatLng(defaultLat, defaultLng),
                zoom: 13,
                scrollwheel: false,
                styles: [{
                        featureType: "administrative",
                        elementType: "labels",
                        stylers: [{
                            visibility: "off"
                        }]
                    },
                    {
                        featureType: "water",
                        elementType: "labels",
                        stylers: [{
                            visibility: "off"
                        }]
                    },
                    {
                        featureType: 'poi.business',
                        stylers: [{
                            visibility: 'off'
                        }]
                    },
                    {
                        featureType: 'transit',
                        elementType: 'labels.icon',
                        stylers: [{
                            visibility: 'off'
                        }]
                    },
                ]
            };
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            var infoWindow = new google.maps.InfoWindow();
            var myLatlng = new google.maps.LatLng(defaultLat, defaultLng);

            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map
            });
            (function(marker) {
                google.maps.event.addListener(marker, "click", function(e) {
                    infoWindow.setContent("" +
                        "<div class='map-edu contact-map-content'>" +
                        "<div class='map-content'>" +
                        "<p class='address'>Khách sạn K-Hotel, số 6 Vũ Mộng Nguyên, </p>" +
                        "<ul class='map-edu-list'> " +
                        "<li><i class='fa fa-phone'></i>  +8499907777</li> " +
                        "<li><i class='fa fa-envelope'></i>  k.hotel668@gmail.com</li> " +
                        "<li><a href='https://khotel.com'><i class='fa fa-globe'></i>  https://khotel.com</li></a> " +
                        "</ul>" +
                        "</div>" +
                        "</div>");
                    infoWindow.open(map, marker);
                });
            })(marker);
        }
        LoadMap();
    </script>
@endpush
