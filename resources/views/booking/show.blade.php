@extends('layouts.admin')

@section('content')
    @include('components.admin.header', [
        'parent' => 'Đặt phòng',
        'child' => 'Thông tin đặt phòng',
    ])

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Order details page-->
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <!--begin::Order summary-->
                    <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                        <!--begin::Order details-->
                        <div class="card card-flush py-4 flex-row-fluid">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Thông tin đặt phòng (#{{ $booking->code }})</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600">
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                                                                    fill="black" />
                                                                <path opacity="0.3"
                                                                    d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                                                                    fill="black" />
                                                                <path
                                                                    d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Trạng thái
                                                    </div>
                                                </td>
                                                <td class="fw-bolder text-end">
                                                    <select class="status-select form-select mb-2" name="status"
                                                        data-control="select2" data-hide-search="true"
                                                        data-placeholder="Select an option"
                                                        data-url="{{ route('bookings.update', ['booking' => $booking->id]) }}">
                                                        <option value="pending"
                                                            @if ($booking->status === 'pending') selected @endif>
                                                            {{ __('messages.pending') }}
                                                        </option>
                                                        <option value="confirmed"
                                                            @if ($booking->status === 'confirmed') selected @endif>
                                                            {{ __('messages.confirmed') }}
                                                        </option>
                                                        <option value="paid"
                                                            @if ($booking->status === 'paid') selected @endif>
                                                            {{ __('messages.paid') }}
                                                        </option>
                                                        <option value="canceled"
                                                            @if ($booking->status === 'canceled') selected @endif>
                                                            {{ __('messages.canceled') }}
                                                        </option>
                                                        <option value="checked_in"
                                                            @if ($booking->status === 'checked_in') selected @endif>
                                                            {{ __('messages.checked_in') }}
                                                        </option>
                                                        <option value="checked_out"
                                                            @if ($booking->status === 'checked_out') selected @endif>
                                                            {{ __('messages.checked_out') }}
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <!--begin::Date-->
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="21" viewBox="0 0 20 21" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                                    fill="black" />
                                                                <path
                                                                    d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Thời gian tạo
                                                    </div>
                                                </td>
                                                <td class="fw-bolder text-end">
                                                    {{ $booking->created_at->format('H:i - d/m/Y') }}
                                                </td>
                                            </tr>
                                            <!--end::Date-->
                                            <!--begin::Date-->
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="21" viewBox="0 0 20 21" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                                    fill="black" />
                                                                <path
                                                                    d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Cập nhật lần cuối
                                                    </div>
                                                </td>
                                                <td class="fw-bolder text-end">
                                                    {{ $booking->updated_at->format('H:i - d/m/Y') }}
                                                </td>
                                            </tr>
                                            <!--end::Date-->
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="21" viewBox="0 0 20 21" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                                    fill="black" />
                                                                <path
                                                                    d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Nhận phòng
                                                    </div>
                                                </td>
                                                <td class="fw-bolder text-end">
                                                    14:00 - {{ $booking->checkin->format('d/m/Y') }} </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="21" viewBox="0 0 20 21" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                                    fill="black" />
                                                                <path
                                                                    d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Trả phòng
                                                    </div>
                                                </td>
                                                <td class="fw-bolder text-end">
                                                    12:00 - {{ $booking->checkout->format('d/m/Y') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                        <i class="fas fa-users fs-5 me-3"></i>
                                                        <!--end::Svg Icon-->Số người lớn
                                                    </div>
                                                </td>
                                                <td class="fw-bolder text-end">
                                                    {{ $booking->adults }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                        <i class="fas fa-users fs-5 me-3"></i>
                                                        <!--end::Svg Icon-->Số trẻ em
                                                    </div>
                                                </td>
                                                <td class="fw-bolder text-end">
                                                    {{ $booking->children }}
                                                    @if (count($booking->children_ages) > 0)
                                                        (@foreach ($booking->children_ages as $index => $age)
                                                            {{ $age }} tuổi
                                                            @if ($index < count($booking->children_ages) - 1)
                                                                ,
                                                            @endif
                                                        @endforeach)
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                        <i class="fas fa-building fs-5 me-5"></i>
                                                        <!--end::Svg Icon-->Danh sách phòng
                                                    </div>
                                                </td>
                                                <td class="fw-bolder text-end">
                                                    @foreach ($booking->rooms as $room)
                                                        <div>{{ $room->name }}</div>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                        <i class="fas fa-book fs-5 me-5"></i>
                                                        <!--end::Svg Icon-->Ghi chú
                                                    </div>
                                                </td>
                                                <td class="fw-bolder text-end">
                                                    {{ $booking->note }}
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Order details-->
                        <div>

                            <!--begin::Customer details-->
                            <div class="card card-flush py-4 flex-row-fluid">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Thông tin khách hàng</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600">
                                                <!--begin::Customer name-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                            <span class="svg-icon svg-icon-2 me-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                                        fill="black" />
                                                                    <path
                                                                        d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->Khách hàng
                                                        </div>
                                                    </td>
                                                    <td class="fw-bolder text-end">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <!--begin:: Avatar -->
                                                            <div
                                                                class="symbol symbol-circle symbol-25px overflow-hidden me-3">
                                                                <a>
                                                                    <div class="symbol-label">
                                                                        <img
                                                                            src="{{ Avatar::create($booking->customer->name)->setFontSize(10)->toBase64() }}" />
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Name-->
                                                            <a
                                                                class="text-gray-600 text-hover-primary">{{ $booking->customer->name }}</a>
                                                            <!--end::Name-->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--end::Customer name-->
                                                <!--begin::Customer email-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                            <span class="svg-icon svg-icon-2 me-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                                        fill="black" />
                                                                    <path
                                                                        d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->Email
                                                        </div>
                                                    </td>
                                                    <td class="fw-bolder text-end">
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary">{{ $booking->customer->email }}</a>
                                                    </td>
                                                </tr>
                                                <!--end::Payment method-->
                                                <!--begin::Date-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                                            <span class="svg-icon svg-icon-2 me-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z"
                                                                        fill="black" />
                                                                    <path opacity="0.3" d="M19 4H5V20H19V4Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->{{ __('messages.phone_number') }}
                                                        </div>
                                                    </td>
                                                    <td class="fw-bolder text-end">{{ $booking->customer->phone }}</td>
                                                </tr>
                                                <!--end::Date-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Customer details-->
                            <!--begin::Payment address-->
                            <div class="card card-flush py-4 flex-row-fluid overflow-hidden" style="margin-top: 30px;">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Bình luận - Đánh giá</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    @if ($booking->rating)
                                        <div class="d-flex align-items-center">
                                            <img style="height:50px;margin-right:10px;"
                                                src="{{ Avatar::create($booking->customer->name)->setFontSize(35)->toBase64() }}" />
                                            <div>
                                                @include('components.view_rating', [
                                                    'rating' => $booking->rating->rating,
                                                ])
                                                <div class="mt-2">{{ $booking->rating->comment }}</div>
                                            </div>
                                        </div>
                                    @else
                                        <div>Chưa có đánh giá</div>
                                    @endif
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Payment address-->
                        </div>
                    </div>
                    <!--end::Order summary-->
                </div>
                <!--end::Order details page-->
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
    <script>
        $('.status-select').on('input', function() {
            const status = $(this).val();
            const url = $(this).data('url');
            if (status) {
                $.ajax({
                    type: 'PUT',
                    url,
                    data: {
                        status,
                    },
                    success: function(res) {
                        toastr.success('Cập nhật trạng thái thành công!');
                    },
                });
            }
        });
    </script>
@endpush
