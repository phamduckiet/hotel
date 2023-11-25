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
                            <h1><span>Đánh giá</span></h1>
                        </div>
                        <ul class="comments">
                            @foreach ($roomType->ratings as $rating)
                                <li>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="{{ asset('hotel-alpha/img/avatar/avatar-5.png') }}"
                                                    alt="avatar-5">
                                            </a>
                                        </div>
                                        <div class="comment-content mb-0">
                                            <div class="comment-meta">
                                                <div class="comment-meta-author">
                                                    {{ $rating->user->name }}
                                                </div>
                                                <div class="comment-meta-date">
                                                    <span
                                                        class="hidden-xs">{{ $rating->created_at->format('H:i d/m/Y') }}</span>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="comment-body">
                                                <div class="comment-rating">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($rating->rating >= $i)
                                                            <i class="fa fa-star"></i>
                                                        @else
                                                            <i class="fa fa-star-o"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <p>{{ $rating->comment }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Comments section end -->
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
                                                    <label>Nhận phòng</label>
                                                    <input type="text" class="btn-default datepicker"
                                                        placeholder="Nhận phòng" name="checkin"
                                                        value="{{ $checkin }}" data-date-format="dd/mm/yyyy">
                                                    @error('checkin')
                                                        <div class="text-danger error-text"><small>{{ $message }}</small>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Trả phòng</label>
                                                    <input type="text" class="btn-default datepicker"
                                                        placeholder="Trả phòng" name="checkout"
                                                        value="{{ $checkout }}" data-date-format="dd/mm/yyyy">
                                                    @error('checkout')
                                                        <div class="text-danger error-text"><small>{{ $message }}</small>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Số lượng phòng</label>
                                                    <select class="selectpicker search-fields form-control-2"
                                                        name="room_total">
                                                        @foreach ($roomType->rooms as $key => $room)
                                                            <option value="{{ $key + 1 }}"
                                                                @if ($key === (int) request('room_total') - 1) selected @endif>
                                                                {{ $key + 1 }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('room_total')
                                                        <div class="text-danger error-text"><small>{{ $message }}</small>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Số lượng người lớn</label>
                                                    <select class="selectpicker search-fields form-control-2"
                                                        name="adults">
                                                        @for ($i = 1; $i <= $roomType->max_adults; $i++)
                                                            <option value="{{ $i }}"
                                                                @if ($i === (int) request('adults')) selected @endif>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    @error('adults')
                                                        <div class="text-danger error-text"><small>{{ $message }}</small>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Số lượng trẻ em</label>
                                                    <select
                                                        class="children-count-input selectpicker search-fields form-control-2"
                                                        name="children">
                                                        <option value="0">Số lượng trẻ em</option>
                                                        @for ($i = 1; $i <= $roomType->max_children; $i++)
                                                            <option value="{{ $i }}"
                                                                @if ($i === (int) request('children')) selected @endif>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="children-ages-container">
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Ghi chú</label>
                                                    <textarea class="form-control" name="note" placeholder="Ghi chú" rows="3" style="border-color:white;"></textarea>
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
                                <h1>Phòng tương tự</h1>
                            </div>
                            @foreach ($otherRoomTypes as $roomType)
                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="{{ $roomType->avatar_link }}" alt="small-img">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="media-heading">
                                            <a
                                                href="{{ route('room.detail', ['room_type' => $roomType->id]) }}">{{ $roomType->name }}</a>
                                        </h3>
                                        <p>@money($roomType->price, 'VND')</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Recent News end -->

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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms detail section end -->
@endsection

@push('styles')
    <style>
        .error-text {
            margin-top: 6px;
            margin-bottom: -15px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $('.children-count-input').on('change', function(e) {
            var value = $(this).val();
            $('.children-ages-container').empty();
            for (let i = 0; i < value; i++) {
                var itemHTML = `
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Độ tuổi trẻ em</label>
                            <input type="number" min="1" max="15" class="btn-default" placeholder="Độ tuổi trẻ em" name="children_ages[]" required>
                            @error('childen_ages')
                                <div class="text-danger error-text"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>`;

                $('.children-ages-container').append(itemHTML);
            }
        });
    </script>
@endpush
