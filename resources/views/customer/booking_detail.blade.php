@extends('layouts.customer')

@section('content')
    @if (Session::get('success'))
        <input id="success-message" type="hidden" value="{{ Session::get('success') }}" />
    @endif
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Thông tin đặt phòng</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Đặt phòng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Events details section start -->
    <div class="events-details-section content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <!-- Events details start -->
                    <div class="events-box events-details">
                        <div class="recent-news-theme">
                            <img src="{{ $booking->roomType->avatar_link }}" alt="events-img-1" class="img-responsive">
                            <div class="date-box">
                                {{ $booking->roomType->name }}
                            </div>
                        </div>
                        <div class="events-box-content">
                            <h1><a href="events-details.html">{{ $booking->roomType->name }}</a></h1>
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Khách sạn K Hotel, 06 Hồ Xuân Hương. TP Đà Nẵng</a></li>
                            </ul>
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="fecilities">
                                        <li>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            Nhận phòng: <strong>{{ $booking->checkin->format('d/m/Y') }} (14h00)</strong>
                                        </li>
                                        <li>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            Trả phòng: <strong>{{ $booking->checkout->format('d/m/Y') }} (12h00)</strong>
                                        </li>
                                        <li>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            Số người lớn: <strong>{{ $booking->adults }}</strong>
                                        </li>
                                        <li>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            Số trẻ em: <strong>{{ $booking->children }}</strong>
                                        </li>
                                        <li>
                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                            Số lượng phòng: <strong>{{ $booking->room_total }}</strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div style="display:flex;justify-content:flex-end;">
                                <button type="button" class="btn-md btn-grey">Hủy đặt phòng</button>
                                <button type="submit" class="btn-md btn-theme" style="margin-left:15px;">Thanh toán qua
                                    Paypal</button>
                            </div>
                        </div>
                    </div>
                    <!-- Events details -->

                    <!-- Contact 1 start -->
                    <div class="contact-1 sidebar-widget">
                        <div class="main-title-2">
                            <h1> <span>Bình luận - Đánh giá</span></h1>
                        </div>
                        <div class="contact-form">
                            <form id="contact_form"
                                action="https://storage.googleapis.com/themevessel-items/hotel-alpha/index.html"
                                method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                        <div class="form-group message">
                                            <textarea class="input-text" name="message" placeholder="Nhập bình luận"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                        <div class="send-btn mb-0">
                                            <button type="submit" class="btn-md btn-theme">Gửi đánh giá</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Contact-1 end -->
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="sidebar">
                        <div class="sidebar-widget category-posts">
                            <div class="main-title-2">
                                <h1>Thông tin đặt phòng</h1>
                            </div>
                            <ul class="list-unstyled list-cat">
                                <li><a href="#">Mã đặt chỗ<span>
                                            <strong>{{ $booking->code }}</strong>
                                        </span></a></li>
                                <li><a href="#">Thời gian
                                        đặt<span><strong>{{ $booking->created_at->format('d/m/Y') }}</strong></span></a>
                                </li>
                                <li><a href="#">Trạng thái<span>
                                            @include('components.status', [
                                                'status' => $booking->status,
                                            ])
                                        </span></a></li>
                                <li><a href="#">Nhận phòng<span><strong>{{ $booking->checkin->format('d/m/Y') }}
                                                (14h00)</strong></span></a></li>
                                <li><a href="#">Trả phòng<span><strong>{{ $booking->checkout->format('d/m/Y') }}
                                                (14h00)</strong></span></a></li>
                                <li><a href="#">Tổng thanh toán<span><strong>@money($booking->money_total, 'VND')</strong></span></a>
                                </li>
                                <div style="display:flex;justify-content:flex-end;margin-top:15px;">
                                    <button type="button" class="btn btn-grey" style="padding:5px 10px;">Hủy đặt phòng</button>
                                    <button type="submit" class="btn btn-theme" style="margin-left:15px;padding:5px 11px;">Thanh toán qua
                                        Paypal</button>
                                </div>
                            </ul>
                        </div>
                        <div class="sidebar-widget category-posts">
                            <div class="main-title-2">
                                <h1>Thông tin khách hàng</h1>
                            </div>
                            <ul class="list-unstyled list-cat">
                                <li><a href="#">Họ tên<span>
                                            <img src="{{ Avatar::create($booking->customer->name)->toBase64() }}"
                                                width="25px" height="25px" style="margin-right:5px;" />
                                            <strong>{{ $booking->customer->name }}</strong>
                                        </span></a></li>
                                <li><a
                                        href="#">Email<span><strong>{{ $booking->customer->email }}</strong></span></a>
                                </li>
                                <li><a href="#">Số điện
                                        thoại<span><strong>{{ $booking->customer->phone }}</strong></span></a></li>
                            </ul>
                        </div>

                        <!-- Recent News start -->
                        <div class="sidebar-widget recent-news">
                            <div class="main-title-2">
                                <h1>Recent News</h1>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="img/room/small-img.jpg" alt="small-img">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">A Standard Blog Post</a>
                                    </h3>
                                    <p>From 80 $ per night</p>
                                    <h5><i class="fa fa-calendar"></i>18/10/2017</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="img/room/small-img-2.jpg" alt="small-img-2">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Wedding David & karen</a>
                                    </h3>
                                    <p>From 80 $ per night</p>
                                    <h5><i class="fa fa-calendar"></i>18/10/2017</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="img/room/small-img-3.jpg" alt="small-img-3">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Pool Party in summer</a>
                                    </h3>
                                    <p>From 80 $ per night</p>
                                    <h5><i class="fa fa-calendar"></i>18/10/2017</h5>
                                </div>
                            </div>
                        </div>
                        <!-- Recent News end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Events details section end -->
@endsection

@push('scripts')
    <script src="{{ asset('metronic/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('metronic/assets/js/scripts.bundle.js') }}"></script>
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    {{-- <script src="{{ asset('resources/js/customer/order_history.js') }}"></script> --}}
@endpush
