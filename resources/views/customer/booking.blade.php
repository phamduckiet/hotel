@extends('layouts.customer')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Booking System</h1>
                <ul class="breadcrumbs">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Booking System</li>
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
                                <h3 class="booking-heading">Personal Info</h3>
                            </li>
                            <li role="presentation">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title=""
                                    data-original-title="Step 3">
                                    <span class="round-tab">
                                        <i class="fa fa-cc"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">Payment Info</h3>
                            </li>
                            <li role="presentation">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title=""
                                    data-original-title="Complete">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">Review</h3>
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
                                            <h3 class="booking-heading-2 black-color">Personal Info</h3>
                                            <div class="row mb-30">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group firstname">
                                                        <label>Họ tên</label>
                                                        <input type="text" name="name" class="input-text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group city">
                                                        <label>Email</label>
                                                        <input type="text" name="email" class="input-text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group city">
                                                        <label>Số điện thoại</label>
                                                        <input type="text" name="phone_number" class="input-text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    @if ($cart)
                                        <div class="col-lg-4 col-md-4 col-xs-12 col-md-pull-8">
                                            <div class="booling-details-box">
                                                <h3 class="booking-heading-2">Booking Details</h3>
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
                                                        <span>Check In:</span> {{ $cart->options->checkin }}
                                                    </li>
                                                    <li>
                                                        <span>Check Out:</span> {{ $cart->options->checkout }}
                                                    </li>
                                                    <li>
                                                        <span>Rooms:</span> {{ $cart->qty }}
                                                    </li>
                                                    <li>
                                                        <span>Adults:</span> {{ $cart->options->adults }}
                                                    </li>
                                                    <li>
                                                        <span>Child:</span> {{ $cart->options->children }}
                                                    </li>
                                                </ul>

                                                <div class="price">
                                                    Total: {{ Cart::total() }} VND
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <div class="clearfix"></div>

                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-grey prev-step">Previous</button></li>
                                    <li><button type="button" class="btn search-button btn-theme next-step">Save and
                                            continue</button></li>
                                </ul>
                            </div>

                            <!-- Thanh toán (để sau) -->
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-xs-12">
                                        <div class="contact-form sidebar-widget">
                                            <h3 class="booking-heading-2 black-color">Billing Address</h3>
                                            <div class="row mb-30">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group fullname">
                                                        <label>First Name</label>
                                                        <input type="text" name="full-name" class="input-text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group fullname">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last-name" class="input-text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group fullname">
                                                        <label>Address Line 1</label>
                                                        <input type="text" name="address-line-1" class="input-text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group fullname">
                                                        <label>Address Line 2</label>
                                                        <input type="text" name="address-line-2" class="input-text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group fullname">
                                                        <label>City</label>
                                                        <input type="text" name="city" class="input-text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group fullname">
                                                        <label>Zip/Post Code</label>
                                                        <input type="text" name="Zip" class="input-text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group fullname">
                                                        <label>State/Region</label>
                                                        <input type="text" name="state" class="input-text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group Country">
                                                        <label>Country</label>
                                                        <select class="selectpicker country search-fields" name="Country">
                                                            <option>Select your county</option>
                                                            <option>United Kingdom</option>
                                                            <option>Canada</option>
                                                            <option>Australia</option>
                                                            <option>France</option>
                                                            <option>Spain</option>
                                                            <option>Brazil</option>
                                                            <option>Bhutan</option>
                                                            <option>Bangladesh</option>
                                                            <option>India</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <h3 class="booking-heading-2">Card Info</h3>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group phone">
                                                        <label>Card Number</label>
                                                        <input type="text" name="card-number" class="input-text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group email">
                                                        <label>CVV</label>
                                                        <input type="text" name="cvv" class="input-text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group Country">
                                                        <label>Expire</label>
                                                        <select class="selectpicker country search-fields" name="Country">
                                                            <option>Month</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group Country">
                                                        <label>Year</label>
                                                        <select class="selectpicker country search-fields" name="Country">
                                                            <option>2017</option>
                                                            <option>2016</option>
                                                            <option>2015</option>
                                                            <option>2014</option>
                                                            <option>2013</option>
                                                            <option>2012</option>
                                                            <option>2011</option>
                                                            <option>2010</option>
                                                            <option>2009</option>
                                                            <option>2008</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                        <div class="booling-details-box">
                                            <h3 class="booking-heading-2">Booking Details</h3>

                                            <!--  Rooms detail slider start -->
                                            <div class="rooms-detail-slider simple-slider ">
                                                <div id="carousel-custom-2" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-outer">
                                                        <!-- Wrapper for slides -->
                                                        <div class="carousel-inner">
                                                            <div class="item">
                                                                <img src="hotel-alpha/img/room/img-2.jpg"
                                                                    class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="hotel-alpha/img/room/img-1.jpg"
                                                                    class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="hotel-alpha/img/room/img-5.jpg"
                                                                    class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="hotel-alpha/img/room/img-6.jpg"
                                                                    class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="hotel-alpha/img/room/img-3.jpg"
                                                                    class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="hotel-alpha/img/room/img-7.jpg"
                                                                    class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item active">
                                                                <img src="hotel-alpha/img/room/img-4.jpg"
                                                                    class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                        </div>
                                                        <!-- Controls -->
                                                        <a class="left carousel-control" href="#carousel-custom-2"
                                                            role="button" data-slide="prev">
                                                            <span class="slider-mover-left no-bg" aria-hidden="true">
                                                                <i class="fa fa-angle-left"></i>
                                                            </span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="right carousel-control" href="#carousel-custom-2"
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

                                            <h4>Luxury Room</h4>

                                            <ul>
                                                <li>
                                                    <span>Check In:</span> october 27, 2017
                                                </li>
                                                <li>
                                                    <span>Check Out:</span> october 29, 2017
                                                </li>
                                                <li>
                                                    <span>Rooms:</span> 3
                                                </li>
                                                <li>
                                                    <span>Adults:</span> 2
                                                </li>
                                                <li>
                                                    <span>Child:</span> 1
                                                </li>
                                            </ul>

                                            <div class="your-address">
                                                <strong>Your Address:</strong>
                                                <address>
                                                    <strong>John maikel</strong>
                                                    <br><br>
                                                    Level 13, 2 Elizabeth St, Melbourne
                                                    Victoria 3000
                                                </address>
                                            </div>

                                            <div class="price">
                                                Total:$317.99
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-grey prev-step">Previous</button></li>
                                    <li><button type="button" class="btn btn-grey  next-step">Skip</button></li>
                                    <li><button type="button" class="btn search-button btn-theme next-step">Save and
                                            continue</button></li>
                                </ul>
                            </div>

                            <!-- Review -->
                            <div class="tab-pane" role="tabpanel" id="complete">
                                <div class="booling-details-box booling-details-box-2 mrg-btm-30">
                                    <h3 class="booking-heading-2">Booking Details</h3>
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
                                                                    <img src="{{ $image->link }}"
                                                                        class="thumb-preview" alt="Chevrolet Impala">
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
                                            <h4>Your Payment ID: #302112295143</h4>

                                            <ul>
                                                <li>
                                                    <span>Check In:</span> {{ $cart->options->checkin }}
                                                </li>
                                                <li>
                                                    <span>Check Out:</span> {{ $cart->options->checkout }}
                                                </li>
                                                <li>
                                                    <span>Số lượng phòng:</span> {{ $cart->qty }}
                                                </li>
                                                <li>
                                                    <span>Adults:</span> {{ $cart->options->adults }}
                                                </li>
                                                <li>
                                                    <span>Child:</span> {{ $cart->options->children }}
                                                </li>
                                            </ul>
                                            <div class="price">
                                                Total: {{ Cart::total() }} VND
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 hidden-sm hidden-xs">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar
                                                neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla
                                                posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam
                                                erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor
                                                iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat
                                                purus viverra a. Aliquam pellentesque nibh et nibh feugiat gravida. Maecenas
                                                ultricies, diam vitae semper placerat, velit risus accumsan nisl, eget
                                                tempor lacus est vel</p>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <br />
                                <ul class="list-inline pull-right">
                                    <li><button type="submit" class="btn search-button btn-theme next-step">confirm
                                            booking</button></li>
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
