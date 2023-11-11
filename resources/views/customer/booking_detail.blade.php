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
                                        <li>
                                            <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                            Ghi chú: {{ $booking->note }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div style="display:flex;justify-content:flex-end;">
                                @if ($booking->status === 'pending')
                                    <button type="button"
                                        data-url="{{ route('bookings.destroy', ['booking' => $booking->id]) }}"
                                        data-id="{{ $booking->id }}" class="cancel-btn btn-md btn-grey">Hủy đặt
                                        phòng</button>
                                @endif
                                @if ($booking->canPay())
                                    <div class="dropdown">
                                        <button type="button" class="btn-md btn-theme"
                                            style="margin-left:15px;height:46px;" data-toggle="dropdown">Thanh toán
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li style="margin-right:0;"><a
                                                    href="{{ route('my_bookings.pay', ['booking' => $booking->id]) }}">Thanh
                                                    toán
                                                    qua
                                                    Paypal</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#qr-bank-modal">Chuyển
                                                    khoản</a></li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Events details -->

                    <!-- The modal -->
                    <div class="modal fade" id="qr-bank-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="modalLabel" style="font-weight:600;">Thông tin chuyển khoản
                                    </h4>
                                </div>
                                <div class="modal-body" style="display:flex;justify-content:center;">
                                    <img src="{{ asset('qr-bank.jpeg') }}" style="width:80%;">
                                </div>
                                <div class="text-center" style="font-size:20px;font-weight:600;margin-bottom:20px;">
                                    Nội dung chuyển khoản: {{ $booking->code }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact 1 start -->
                    @if ($booking->canRate())
                        <div class="contact-1 sidebar-widget">
                            <div class="main-title-2">
                                <h1> <span>Bình luận - Đánh giá</span></h1>
                            </div>
                            <div class="contact-form">
                                @if ($booking->rating)
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span
                                            class="fa fa-star star-rating @if ($booking->rating->rating >= $i) checked @endif"></span>
                                    @endfor
                                    <div style="margin-top:15px;">{{ $booking->rating->comment }}</div>
                                @elseif ($booking->canRate())
                                    <form method="POST"
                                        action="{{ route('bookings.rate', ['booking' => $booking->id]) }}">
                                        @csrf
                                        <select class="star-rating" name="rating">
                                            <option value="">Select a rating</option>
                                            <option value="5">Rất hài lòng</option>
                                            <option value="4">Hài lòng</option>
                                            <option value="3">Tạm được</option>
                                            <option value="2">Không hài lòng</option>
                                            <option value="1">Rất tệ</option>
                                        </select>
                                        <div class="row" style="margin-top: 20px;">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                                <div class="form-group message">
                                                    <textarea class="input-text" name="comment" placeholder="Nhập bình luận"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                                <div class="send-btn mb-0">
                                                    <button type="submit" class="btn-md btn-theme">Gửi đánh giá</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endif
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
                                            @include('components.customer.status', [
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
                                    @if ($booking->canCancel())
                                        <button type="button"
                                            data-url="{{ route('bookings.destroy', ['booking' => $booking->id]) }}"
                                            data-id="{{ $booking->id }}" class="cancel-btn btn btn-grey"
                                            style="padding:6.5px 10px;">Hủy đặt phòng</button>
                                    @endif
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
                                <h1>Xem thêm</h1>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Events details section end -->
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ asset('vendor/star-rating.js/dist/star-rating.min.css') }}" rel="stylesheet">
    <style>
        .swal2-confirm {
            border: none;
        }

        .swal2-cancel {
            margin-left: 14px;
        }

        .fa-start {
            color: red;
        }

        .star-rating {
            color: #B4B4B3;
            font-size: 22px;
        }

        .checked {
            color: #fdd835;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('metronic/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('metronic/assets/js/scripts.bundle.js') }}"></script>
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('vendor/star-rating.js/dist/star-rating.min.js') }}"></script>
    <script>
        // Initialize star rating
        const stars = new StarRating('.star-rating', {
            tooltip: false,
        });
        // Show success toast message
        const successMessage = window.localStorage.getItem('success_message');
        if (successMessage) {
            window.localStorage.removeItem('success_message');
            toastr.success(successMessage);
        }
        if ($('#success-message').val()) {
            toastr.success($('#success-message').val());
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.cancel-btn').click((e) => {
            const url = $(e.target).data('url');
            const id = $(e.target).data('id');
            Swal.fire({
                title: 'Bạn có chắc chắn muốn huỷ đặt phòng?',
                icon: 'warning',
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: 'Xác nhận',
                cancelButtonText: 'Hủy thao tác',
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: 'btn btn-light',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url,
                        success: function(data) {
                            window.localStorage.setItem('success_message',
                                'Huỷ đặt phòng thành công!');
                            window.location.reload();
                        },
                    });
                }
            });
        });
    </script>
@endpush
