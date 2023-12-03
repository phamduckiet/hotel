@extends('layouts.customer')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Thông tin đặt phòng</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Thông tin đặt phòng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Booking flow start -->
    <div class="booking-flow content-area-10">
        <div class="container">
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title=""
                                    data-original-title="Step 2" aria-expanded="true">
                                    <span class="round-tab">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">Thông tin khách hàng</h3>
                            </li>
                            {{-- <li role="presentation">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title=""
                                    data-original-title="Step 3">
                                    <span class="round-tab">
                                        <i class="fa fa-cc"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">Payment Info</h3>
                            </li> --}}
                            <li role="presentation">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title=""
                                    data-original-title="Complete">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">Xác nhận</h3>
                            </li>
                        </ul>
                    </div>

                    <form method="POST" id="contact_form" action="{{ route('bookings.store') }}">
                        @csrf
                        <div class="tab-content">
                            <!-- Nhập thông tin khách hàng -->
                            <div class="tab-pane active" role="tabpanel" id="step2">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-xs-12 col-md-push-4">
                                        <div class="contact-form sidebar-widget">
                                            <h3 class="booking-heading-2 black-color">Thông tin cá nhân</h3>
                                            <div class="row mb-30">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group firstname">
                                                        <label>Họ tên</label>
                                                        <input type="text" name="name" class="input-text" value="{{ auth()->user()?->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group city">
                                                        <label>Email</label>
                                                        <input type="text" name="email" class="input-text" value="{{ auth()->user()?->email}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group city">
                                                        <label>Số điện thoại</label>
                                                        <input type="text" name="phone_number" class="input-text" value="{{ auth()->user()?->customer?->phone}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    @if ($cart)
                                        <div class="col-lg-4 col-md-4 col-xs-12 col-md-pull-8">
                                            <div class="booling-details-box">
                                                <h3 class="booking-heading-2">Thông tin đặt phòng</h3>
                                                <!--  Rooms detail slider start -->
                                                <div class="rooms-detail-slider simple-slider ">
                                                    <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                                                        <div class="carousel-outer">
                                                            <!-- Wrapper for slides -->
                                                            <div class="carousel-inner">
                                                                @foreach ($cart->options->images as $key => $image)
                                                                    <div
                                                                        class="item @if ($key === 0) active @endif">
                                                                        <img src="{{ $image->link }}"
                                                                            class="thumb-preview">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <!-- Controls -->
                                                            <a class="left carousel-control" href="#carousel-custom"
                                                                role="button" data-slide="prev">
                                                                <span class="slider-mover-left no-bg" aria-hidden="true">
                                                                    <i class="fa fa-angle-left"></i>
                                                                </span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="right carousel-control" href="#carousel-custom"
                                                                role="button" data-slide="next">
                                                                <span class="slider-mover-right no-bg" aria-hidden="true">
                                                                    <i class="fa fa-angle-right"></i>
                                                                </span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Rooms detail slider end -->
                                                <h4>{{ $cart->name }}</h4>
                                                <ul>
                                                    <li>
                                                        <span>Nhận phòng:</span> {{ $cart->options->checkin }}
                                                    </li>
                                                    <li>
                                                        <span>Trả phòng:</span> {{ $cart->options->checkout }}
                                                    </li>
                                                    <li>
                                                        <span>Số lượng phòng:</span> {{ $cart->qty }}
                                                    </li>
                                                    <li>
                                                        <span>Số người lớn:</span> {{ $cart->options->adults }}
                                                    </li>
                                                    <li>
                                                        <span>Số trẻ em:</span> {{ $cart->options->children }}
                                                    </li>
                                                </ul>

                                                <div class="price">
                                                    Tổng tiền: @money(Cart::total() * $cart->options->day_total, 'VND')
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <div class="clearfix"></div>

                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn search-button btn-theme next-step">Tiếp tục</button></li>
                                </ul>
                            </div>

                            <!-- Review -->
                            <div class="tab-pane" role="tabpanel" id="complete">
                                <div class="booling-details-box booling-details-box-2 mrg-btm-30" style="width:100%;">
                                    <h3 class="booking-heading-2">Thông tin đặt phòng</h3>
                                    <div class="row mrg-btm-30">
                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                            <!--  Rooms detail slider start -->
                                            <div class="rooms-detail-slider simple-slider ">
                                                <div id="carousel-custom-3" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-outer">
                                                        <!-- Wrapper for slides -->
                                                        <div class="carousel-inner">
                                                            @foreach ($cart->options->images as $key => $image)
                                                                <div
                                                                    class="item @if ($key === 0) active @endif">
                                                                    <img src="{{ $image->link }}" class="thumb-preview"
                                                                        alt="Chevrolet Impala">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <!-- Controls -->
                                                        <a class="left carousel-control" href="#carousel-custom-3"
                                                            role="button" data-slide="prev">
                                                            <span class="slider-mover-left no-bg" aria-hidden="true">
                                                                <i class="fa fa-angle-left"></i>
                                                            </span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="right carousel-control" href="#carousel-custom-3"
                                                            role="button" data-slide="next">
                                                            <span class="slider-mover-right no-bg" aria-hidden="true">
                                                                <i class="fa fa-angle-right"></i>
                                                            </span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Rooms detail slider end -->
                                            <p class="hidden-lg hidden-md">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis
                                                pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus
                                                suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur
                                                convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus
                                                feugiat. In fermentum facilisis massa, a consequat purus viverra a. Aliquam
                                                pellentesque nibh et nibh feugiat gravida. Maecenas ultricies, diam vitae
                                                semper placerat, velit risus accumsan nisl, eget tempor lacus est vel</p>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <ul>
                                                <li>
                                                    <span>Thời gian nhận phòng:</span> {{ $cart->options->checkin }}
                                                </li>
                                                <li>
                                                    <span>Thời gian trả phòng:</span> {{ $cart->options->checkout }}
                                                </li>
                                                <li>
                                                    <span>Số lượng phòng:</span> {{ $cart->qty }}
                                                </li>
                                                <li>
                                                    <span>Số người lớn:</span> {{ $cart->options->adults }}
                                                </li>
                                                <li>
                                                    <span>Số trẻ em:</span> {{ $cart->options->children }}
                                                </li>
                                            </ul>
                                            <div class="price">
                                                Tổng tiền: @money(Cart::total() * $cart->options->day_total, 'VND')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <br />
                                <ul class="list-inline pull-right">
                                    <li><button type="submit" class="btn search-button btn-theme next-step">Xác nhận đặt phòng</button></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <!-- Booking flow end -->
@endsection

@push('styles')
    <style>
        .wizard .nav-tabs>li {
            width: 50% !important;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(".select-room-btn").on('click', function(event) {
            event.preventDefault();
            const roomTypeId = $(event.target).data('id');
            const urlRequest = $(event.target).data('url');

            const urlParams = new URLSearchParams(window.location.search); // Lay ra cac query paramater
            urlParams.delete('selected_room_id');
            urlParams.append('selected_room_id', roomTypeId);
            urlParams.append('step', 2);
            window.location.href = `/booking?${urlParams.toString()}`;
        });
    </script>
@endpush
