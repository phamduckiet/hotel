@extends('layouts.customer')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Danh sách đặt phòng</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Đặt phòng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Rooms section start -->
    <div class="rooms-section content-area">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Danh sách đặt phòng</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @foreach ($bookings as $booking)
                        <div class="hotel-box-list">
                            <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 col-pad">
                                <img src="{{ $booking->roomType->avatar_link }}" class="img-responsive">
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 detail">
                                <div class="heading">
                                    <div class="title pull-left">
                                        <h3>
                                            <a href="rooms-details.html">{{ $booking->roomType->name }}</a>
                                        </h3>
                                    </div>
                                    <div class="price pull-right">
                                        $567.99/Night
                                    </div>
                                </div>
                                <p>{!! $booking->roomType->summary !!}</p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="fecilities">
                                            <li>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                {{ $booking->checkin->format('d/m/Y') }} - {{ $booking->checkout->format('d/m/Y') }}
                                            </li>
                                            <li>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                Số người lớn: {{ $booking->adults }}
                                            </li>
                                            <li>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                Số trẻ em: {{ $booking->children }}
                                            </li>
                                            <li>
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                Số lượng phòng: {{ $booking->room_total }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiddenmt-15">
                                    <a href="blog-details.html" class="read-more-btn">Xem chi tiết...</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms  section end -->
@endsection
