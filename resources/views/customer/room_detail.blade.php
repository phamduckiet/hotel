@extends('layouts.customer')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Room Detail</h1>
                <ul class="breadcrumbs">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Room Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Rooms detail section start -->
    <div class="content-area rooms-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <!-- Heading courses start -->
                    <div class="heading-rooms  clearfix sidebar-widget">
                        <div class="pull-left">
                            <h3>{{ $roomType->name }}</h3>
                            <p>
                                <i class="fa fa-map-marker"></i>06 Hồ Xuân Hương. TP Đà Nẵng,
                            </p>
                        </div>
                        <div class="pull-right">
                            <h3><span>@money($roomType->price, 'VND')/ngày</span></h3>
                            {{-- <h5>Per Manth</h5> --}}
                        </div>
                    </div>
                    <!-- Heading courses end -->

                    <!-- sidebar start -->
                    <div class="rooms-detail-slider sidebar-widget">
                        <!--  Rooms detail slider start -->
                        <div class="rooms-detail-slider simple-slider mb-40 ">
                            <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                                <div class="carousel-outer">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        @foreach ($roomType->images as $key => $image)
                                            <div class="item @if ($key === 0) active @endif">
                                                <img src="{{ $image->link }}" class="thumb-preview" alt="Chevrolet Impala">
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-custom" role="button"
                                        data-slide="prev">
                                        <span class="slider-mover-left t-slider-l" aria-hidden="true">
                                            <i class="fa fa-angle-left"></i>
                                        </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-custom" role="button"
                                        data-slide="next">
                                        <span class="slider-mover-right t-slider-r" aria-hidden="true">
                                            <i class="fa fa-angle-right"></i>
                                        </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <!-- Indicators -->
                                <ol class="carousel-indicators thumbs visible-lg visible-md">
                                    @foreach ($roomType->images as $key => $image)
                                        <li data-target="#carousel-custom" data-slide-to="{{ $key }}"
                                            class=""><img src="{{ $image->link }}" alt="Chevrolet Impala"></li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        <!-- Rooms detail slider end -->

                        <!-- Search area box 2 start -->
                        <div class="sidebar-widget search-area-box-2 hidden-lg hidden-md clearfix">
                            <div class="text-center">
                                <h3>Search Your Rooms</h3>
                                <h1>$260/Night</h1>
                            </div>
                            <div class="search-contents">
                                <form method="GET">
                                    <div class="row">
                                        <div class="search-your-details">
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="btn-default datepicker"
                                                        placeholder="Check In">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="btn-default datepicker"
                                                        placeholder="Check Out">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2"
                                                        name="room">
                                                        <option>Room</option>
                                                        <option>Single Room</option>
                                                        <option>Double Room</option>
                                                        <option>Deluxe Room</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2"
                                                        name="beds">
                                                        <option>Beds</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2"
                                                        name="adults">
                                                        <option>Adult</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2"
                                                        name="children">
                                                        <option>Child</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <button class="search-button btn-theme">Book Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Search area box 2 end -->

                        <!-- Rooms description start -->
                        <div class="panel-box course-panel-box course-description">
                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab1default">
                                            <div class="divv">
                                                <!-- Title -->
                                                <h3>Mô tả</h3>
                                                <!-- paragraph -->
                                                {!! $roomType->description !!}
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Rooms description end -->
                    </div>
                    <!-- sidebar end -->

                    <!-- Comments section start -->
                    <div class="comments-section sidebar-widget">
                        <!-- Main Title 2 -->
                        <div class="main-title-2">
                            <h1><span>Rooms </span> Reviews</h1>
                        </div>

                        <ul class="comments">
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="{{ asset('hotel-alpha/img/avatar/avatar-5.png') }}" alt="avatar-5">
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <div class="comment-meta-author">
                                                Jane Doe
                                            </div>
                                            <div class="comment-meta-reply">
                                                <a href="#">Reply</a>
                                            </div>
                                            <div class="comment-meta-date">
                                                <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="comment-body">
                                            <div class="comment-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, conser adipiscing elit. Donec luctus tincidunt
                                                aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros.
                                                Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec
                                                vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum.
                                                Suspendisse rhoncus fringilla ipsum quis porta.</p>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <div class="comment">
                                            <div class="comment-author">
                                                <a href="#">
                                                    <img src="{{ asset('hotel-alpha/img/avatar/avatar-5.png') }}"
                                                        alt="avatar-5">
                                                </a>
                                            </div>

                                            <div class="comment-content">
                                                <div class="comment-meta">
                                                    <div class="comment-meta-author">
                                                        Jane Doe
                                                    </div>

                                                    <div class="comment-meta-reply">
                                                        <a href="#">Reply</a>
                                                    </div>

                                                    <div class="comment-meta-date">
                                                        <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="comment-body">
                                                    <div class="comment-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, conser adipiscing elit. Donec luctus
                                                        tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum
                                                        et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus
                                                        tempus nulla. Donec vel nulla dui.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="{{ asset('hotel-alpha/img/avatar/avatar-5.png') }}" alt="avatar-5">
                                        </a>
                                    </div>
                                    <div class="comment-content mb-0">
                                        <div class="comment-meta">
                                            <div class="comment-meta-author">
                                                Jane Doe
                                            </div>
                                            <div class="comment-meta-reply">
                                                <a href="#">Reply</a>
                                            </div>
                                            <div class="comment-meta-date">
                                                <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="comment-body">
                                            <div class="comment-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Comments section end -->

                    <!-- Contact 1 start -->
                    <div class="contact-1 sidebar-widget">
                        <div class="main-title-2">
                            <h1> <span>Leave</span> a Comment</h1>
                        </div>
                        <div class="contact-form">
                            <form id="contact_form"
                                action="https://storage.googleapis.com/themevessel-items/hotel-alpha/index.html"
                                method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group fullname">
                                            <input type="text" name="full-name" class="input-text"
                                                placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group enter-email">
                                            <input type="email" name="email" class="input-text"
                                                placeholder="Enter email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group subject">
                                            <input type="text" name="subject" class="input-text"
                                                placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group number">
                                            <input type="text" name="phone" class="input-text"
                                                placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                        <div class="form-group message">
                                            <textarea class="input-text" name="message" placeholder="Write message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                        <div class="send-btn mb-0">
                                            <button type="submit" class="btn-md btn-theme">Send Message</button>
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
                        <!-- Search area box 2 start -->
                        <div class="sidebar-widget search-area-box-2 hidden-sm hidden-xs clearfix bg-grey">
                            <h3>Đặt Phòng</h3>
                            <h1>Giá: @money($roomType->price, 'VND')/ngày</h1>
                            <h1>{{ $roomType->name }}</h1>
                            <div class="search-contents">
                                <form autocomplete="off" method="POST"
                                    action="{{ route('rooms.booking', ['room_type' => $roomType->id]) }}">
                                    @csrf
                                    <input type="hidden" value="{{ $roomType->id }}" name="room_type_id">
                                    <div class="row">
                                        @php
                                            $checkin = request('checkin') ? Carbon\Carbon::createFromFormat('Y-m-d', request('checkin'))->format('d/m/Y') : null;
                                            $checkout = request('checkout') ? Carbon\Carbon::createFromFormat('Y-m-d', request('checkout'))->format('d/m/Y') : null;
                                        @endphp
                                        <div class="search-your-details">
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="btn-default datepicker"
                                                        placeholder="Nhận phòng" name="checkin"
                                                        value="{{ $checkin }}" data-date-format="dd/mm/yyyy">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="btn-default datepicker"
                                                        placeholder="Trả phòng" name="checkout"
                                                        value="{{ $checkout }}" data-date-format="dd/mm/yyyy">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2"
                                                        name="room_total">
                                                        <option value="0">Số lượng phòng</option>
                                                        @foreach ($roomType->rooms as $key => $room)
                                                            <option value="{{ $key + 1 }}"
                                                                @if ($key === (int) request('room_total') - 1) selected @endif>
                                                                {{ $key + 1 }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2"
                                                        name="adults">
                                                        <option value="0">Số lượng người lớn</option>
                                                        @for ($i = 1; $i <= $roomType->max_adults; $i++)
                                                            <option value="{{ $i }}"
                                                                @if ($i === (int) request('adults')) selected @endif>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2" name="children">
                                                        <option value="0">Số lượng trẻ em</option>
                                                        @for ($i = 1; $i <= $roomType->max_children; $i++)
                                                            <option value="{{ $i }}" @if ($i === (int) request('children')) selected @endif>{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group mrg-btm-10">
                                                    <button type="submit" class="search-button btn-theme">Đặt
                                                        phòng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Search area box 2 end -->

                        <!-- Recent News start -->
                        <div class="sidebar-widget recent-news">
                            <div class="main-title-2">
                                <h1>Recent Posts</h1>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="{{ asset('hotel-alpha/img/room/small-img.jpg') }}"
                                        alt="small-img">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Host a Family Party</a>
                                    </h3>
                                    <p>From 80 $ per night</p>
                                    <h5><i class="fa fa-calendar"></i>18/10/2017</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="{{ asset('hotel-alpha/img/room/small-img-2.jpg') }}"
                                        alt="small-img-2">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Room with View</a>
                                    </h3>
                                    <p>From 80 $ per night</p>
                                    <h5><i class="fa fa-calendar"></i>18/10/2017</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="{{ asset('hotel-alpha/img/room/small-img-3.jpg') }}"
                                        alt="small-img-3">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Double Room</a>
                                    </h3>
                                    <p>From 80 $ per night</p>
                                    <h5><i class="fa fa-calendar"></i>18/10/2017</h5>
                                </div>
                            </div>
                        </div>
                        <!-- Recent News end -->

                        <!-- Category posts start -->
                        <div class="sidebar-widget category-posts">
                            <div class="main-title-2">
                                <h1>Category</h1>
                            </div>
                            <ul class="list-unstyled list-cat">
                                <li><a href="#">Rooms <span>(45)</span></a></li>
                                <li><a href="#">Promotion <span>(21)</span></a></li>
                                <li><a href="#">Events <span>(23)</span></a></li>
                                <li><a href="#">Creative <span>(19)</span></a></li>
                                <li><a href="#">Design <span>(19)</span></a></li>
                                <li><a href="#">Other <span>(22)</span></a></li>
                            </ul>
                        </div>
                        <!-- Category posts end -->

                        <!-- Social media start -->
                        <div class="social-media sidebar-widget clearfix">
                            <!-- Main Title 2 -->
                            <div class="main-title-2">
                                <h1>Social Media</h1>
                            </div>
                            <!-- Social list -->
                            <ul class="social-list">
                                <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="rss-bg"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                        <!-- Social media end -->

                        <!-- tags box start -->
                        <div class="sidebar-widget tags-box">
                            <div class="main-title-2">
                                <h1>Tags</h1>
                            </div>
                            <ul class="tags">
                                <li><a href="#">Rooms</a></li>
                                <li><a href="#">Promotion</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Video</a></li>
                                <li><a href="#">Audio</a></li>
                            </ul>
                        </div>
                        <!-- tags box end -->

                        <!-- Location start  -->
                        <div class="location sidebar-widget">
                            <div class="map">
                                <!-- Main Title 2 -->
                                <div class="main-title-2">
                                    <h1>Location</h1>
                                </div>
                                <div id="map" class="contact-map" style="height: 662px;"></div>
                            </div>
                        </div>
                        <!-- Location end -->

                        <!-- Recent comments start -->
                        <div class="sidebar-widget recent-comments">
                            <div class="main-title-2">
                                <h1>Recent comments</h1>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object"
                                            src="{{ asset('hotel-alpha/img/avatar/avatar-1.jpg ') }}" alt="avatar-1">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <p>Lorem ipsum dolor sit amet,
                                        conser adipiscing elit.
                                        Etiamrisus tortor, accumsan,
                                    </p>
                                    <span>By <b> John Doe</b></span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object"
                                            src="{{ asset('hotel-alpha/img/avatar/avatar-2.jpg ') }}" alt="avatar-1">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <p>Lorem ipsum dolor sit amet,
                                        conser adipiscing elit.
                                        Etiamrisus tortor,
                                    </p>
                                    <span>By <b>Karen Paran</b></span>
                                </div>
                            </div>
                        </div>
                        <!-- Recent comments end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms detail section end -->
@endsection
