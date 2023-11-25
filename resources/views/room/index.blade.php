@extends('layouts.admin')

@section('content')
    @include('components.admin.header', ['parent' => null, 'child' => __('messages.room')])
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                @if (Session::get('success'))
                    <input id="success-message" type="hidden" value="{{ Session::get('success') }}" />
                @endif
                <!--begin::Category-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <!--begin::Flatpickr-->
                            <div class="input-group w-250px">
                                <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Chọn ngày"
                                    id="rooms_flatpickr" />
                            </div>
                            <!--end::Flatpickr-->
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <a href="{{ route('rooms.create') }}" class="btn btn-primary">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                            rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                            fill="black" />
                                    </svg>
                                </span>
                                {{ __('messages.add_room') }}</a>
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0" style="margin-top: -16px;">
                        @foreach ($floors as $floor)
                            <div class="card floor-card mt-8">
                                <div class="card-header floor-card-header">
                                    <span class="mt-6">{{ $floor->name }}</span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex gap-4">
                                        @foreach ($floor->rooms as $room)
                                            <div class="room-item @if (!$room->is_available) room-busy @endif"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal_view_room_detail_{{ $room->id }}">
                                                <div class="h-auto">{{ $room->name }}</div>
                                            </div>
                                            <!--begin::Modal - View room-->
                                            <div class="modal fade" id="modal_view_room_detail_{{ $room->id }}"
                                                tabindex="-1" aria-hidden="true">
                                                <!--begin::Modal dialog-->
                                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                                    <!--begin::Modal content-->
                                                    <div class="modal-content">
                                                        <!--begin::Modal header-->
                                                        <div class="modal-header" id="kt_modal_add_user_header">
                                                            <!--begin::Modal title-->
                                                            <h2 class="fw-bolder">{{ __('messages.room_info') }}
                                                                {{ $room->name }}</h2>
                                                            <!--end::Modal title-->
                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                                data-bs-dismiss="modal">
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                                <span class="svg-icon svg-icon-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.5" x="6" y="17.3137"
                                                                            width="16" height="2" rx="1"
                                                                            transform="rotate(-45 6 17.3137)"
                                                                            fill="black" />
                                                                        <rect x="7.41422" y="6" width="16"
                                                                            height="2" rx="1"
                                                                            transform="rotate(45 7.41422 6)"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>
                                                        <!--end::Modal header-->
                                                        <!--begin::Modal body-->
                                                        <div class="modal-body scroll-y my-7"
                                                            id="{{ 'room-type-item-' . $room->id }}">
                                                            <div class="card-body pt-0">
                                                                <div class="text-center">
                                                                    <div class="image-input image-input-empty image-input-outline mb-3"
                                                                        style="{{ 'background-image: url(' . asset($room->avatar_url) . ')' }}">
                                                                        <!--begin::Preview existing avatar-->
                                                                        <div class="image-input-wrapper w-150px h-150px">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h3>Thông tin phòng</h3>
                                                                <div
                                                                    style="margin-left:20px;font-size:16px;margin-bottom:20px;">
                                                                    <div>{{ __('messages.room') }}: {{ $room->name }}
                                                                    </div>
                                                                    @foreach ($roomTypes as $roomType)
                                                                        @if ($room->type_id === $roomType->id)
                                                                            <div>{{ __('messages.room_types') }}:
                                                                                {{ $roomType->name }}</div>
                                                                            <div>{{ __('messages.price') }}:
                                                                                {{ number_format($roomType->price, 0, ',', '.') }}
                                                                                VNĐ/Ngày</div>
                                                                            <div>{{ __('messages.max_adults') }}:
                                                                                {{ $roomType->max_adults }}</div>
                                                                            <div>{{ __('messages.max_children') }}:
                                                                                {{ $roomType->max_children }}</div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                                @if (count($room->bookings))
                                                                    <h3>Thông tin đặt phòng ngày {{ $date }}</h3>
                                                                    <div style="margin-left:20px;font-size:16px;">
                                                                        @foreach ($room->bookings as $booking)
                                                                            <div>Mã đặt phòng:
                                                                                <strong><a
                                                                                        href="{{ route('bookings.show', ['booking' => $booking->id]) }}">{{ $booking->code }}</a></strong>
                                                                            </div>
                                                                            <div>Tên khách hàng:
                                                                                <strong>{{ $booking->customer->name }}</strong>
                                                                            </div>
                                                                            <div>Email:
                                                                                <strong>{{ $booking->customer->email }}</strong>
                                                                            </div>
                                                                            <div>Số điện thoại:
                                                                                <strong>{{ $booking->customer->phone }}</strong>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="text-center button-container">
                                                                <button class="delete-button delete-btn"
                                                                    data-url="{{ route('rooms.destroy', ['room' => $room->id]) }}"
                                                                    data-id="{{ $room->id }}">{{ __('messages.delete') }}</button>

                                                                <a class="button-link"
                                                                    href="{{ route('rooms.edit', [$room->id]) }}"
                                                                    class="menu-link px-3">
                                                                    {{ __('messages.edit') }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!--end::Modal body-->
                                                    </div>
                                                    <!--end::Modal content-->
                                                </div>
                                                <!--end::Modal dialog-->
                                            </div>
                                            <!--end::Modal - View room-->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Category-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@push('styles')
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendor Stylesheets-->
@endpush

@push('scripts')
    <script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('metronic/assets/js/custom/apps/ecommerce/catalog/roomTypes.js') }}"></script>
    <script src="{{ asset('resources/js/room/index.js') }}"></script>
@endpush

@push('styles')
    <style>
        .delete-button {
            padding: 10px 20px;
            /* Kích thước và đệm */
            border: none;
            cursor: pointer;
            background-color: #ff0000;
            color: #fff;
            margin-right: 5px;
            font-size: 14px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .button-link {
            display: inline-block;
            padding: 10px 20px;
            /* Kích thước và đệm */
            background-color: #00b4fc;
            /* Màu nền */
            color: #fff;
            /* Màu văn bản */
            text-decoration: none;
            /* Loại bỏ gạch chân dưới văn bản */
            border: none;
            /* Loại bỏ đường viền */
            border-radius: 4px;
            /* Bo tròn góc */
            cursor: pointer;
            /* Biến con trỏ thành biểu tượng tay khi di chuột vào */
            transition: background-color 0.3s ease;
            /* Hiệu ứng màu nền khi di chuột vào */
        }

        .button-container .edit-button {
            margin-right: 10px;
        }

        /* Thêm CSS sau đây hoặc tạo một tệp CSS riêng */

        .image-slider {
            position: relative;
            max-width: 100%;
            overflow: hidden;
        }

        .image-container {
            display: flex;
            animation: rotateImages 10s linear infinite;
            /* Tự động quay hình ảnh sau mỗi 10 giây */
        }

        .image {
            max-width: 100%;
            height: auto;
            margin-right: 10px;
        }

        @keyframes rotateImages {
            0% {
                transform: translateX(0);
            }

            33.33% {
                transform: translateX(-100%);
            }

            66.67% {
                transform: translateX(-200%);
            }

            100% {
                transform: translateX(0);
            }
        }


        .floor-card-header {
            background: #F4F5F5 !important;
            font-weight: 500;
            font-size: 16px;
            color: #272727;
            display: flex;
            align-items: center;
        }

        .floor-card {
            border: 1px solid #E9EAEC;
        }

        .room-item {
            background: #02B14F;
            height: 88px;
            text-align: center;
            min-width: 83px;
            border-radius: 6px;
            color: white;
            font-weight: 500;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .room-busy {
            background: #f1416c !important;
        }
    </style>
@endpush
