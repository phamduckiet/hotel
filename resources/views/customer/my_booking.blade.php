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
                                            <a
                                                href="{{ route('my_bookings.show', ['booking' => $booking->id]) }}">{{ $booking->roomType->name }}</a>
                                        </h3>
                                    </div>
                                    <div class="price pull-right">
                                        @money($booking->money_total, 'VND')
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="fecilities">
                                            <li>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                {{ $booking->checkin->format('d/m/Y') }} -
                                                {{ $booking->checkout->format('d/m/Y') }}
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
                                            <li>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                Ngày đặt: {{ $booking->created_at->format('d/m/Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiddenmt-15">
                                    <a href="{{ route('my_bookings.show', ['booking' => $booking->id]) }}"
                                        class="read-more-btn">Xem chi tiết...</a>
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
