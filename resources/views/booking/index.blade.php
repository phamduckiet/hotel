@extends('layouts.admin')

@section('content')
    @include('components.admin.header', [
        'parent' => null,
        'child' => __('messages.bookings'),
    ])

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Products-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-ecommerce-order-filter="search"
                                    class="keyword-filter form-control form-control-solid w-250px ps-14"
                                    placeholder="{{ __('messages.search') }}" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        {{-- <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <!--begin::Flatpickr-->
                            <div class="input-group w-250px">
                                <input class="form-control form-control-solid rounded rounded-end-0"
                                    placeholder="{{ __('messages.pick_date_range') }}" id="kt_ecommerce_sales_flatpickr" />
                                <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2"
                                                rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1"
                                                transform="rotate(45 8.46447 7.05029)" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                            </div>
                            <!--end::Flatpickr-->
                            <div class="w-150 mw-150px">
                                <!--begin::Select2-->
                                <select class="status-filter form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                                    <option value="-1">Tất cả trạng thái</option>
                                    <option value="pending">{{ __('messages.pending') }}</option>
                                    <option value="delivering">{{ __('messages.delivering') }}</option>
                                    <option value="delivered">{{ __('messages.delivered') }}</option>
                                    <option value="canceled">{{ __('messages.canceled') }}</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                            <div class="w-150 mw-150px">
                                <!--begin::Select2-->
                                <select class="total-filter form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Tổng tiền" data-kt-ecommerce-order-filter="status">
                                    <option value="-1">Tất cả khoảng tiền</option>
                                    <option value="under 500">Dưới 500.000</option>
                                    <option value="from 500 to 1000">Từ 500.000 đến 1 triệu</option>
                                    <option value="from 1000 to 2000">Từ 1 triệu đến 2 triệu</option>
                                    <option value="from 2000 to 3000">Từ 2 triệu đến 3 triệu</option>
                                    <option value="from 3000 to 5000">Từ 3 triệu đến 5 triệu</option>
                                    <option value="from 5000">Trên 5 triệu</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                        </div> --}}
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="text-center min-w-100px">Booking ID</th>
                                    <th class="text-center min-w-150px">Khách hàng</th>
                                    <th class="text-center min-w-100px">Loại phòng</th>
                                    <th class="text-center min-w-100px">Trạng thái</th>
                                    <th class="text-center min-w-100px">Checkin</th>
                                    <th class="text-center min-w-100px">Checkout</th>
                                    <th class="text-center min-w-100px">Thành tiền</th>
                                    <th class="text-center min-w-100px">{{ __('messages.actions') }}</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($bookings as $booking)
                                    <!--begin::Table row-->
                                    <tr>
                                        <td class="text-center" data-kt-ecommerce-order-filter="order_id">
                                            <a href=""
                                                class="text-gray-800 text-hover-primary fw-bolder">{{ $booking->id }}</a>
                                        </td>
                                        <!--end::Order ID=-->
                                        <!--begin::Customer=-->
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!--begin:: Avatar -->
                                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                    <img src="{{ Avatar::create($booking->customer->name)->toBase64() }}" />
                                                </div>
                                                <!--end::Avatar-->
                                                <div class="ms-2">
                                                    <!--begin::Title-->
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder">
                                                        {{ $booking->customer->name }}</div>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                        </td>
                                        <!--end::Customer=-->
                                        <!--begin::Total=-->
                                        <td class="text-center">
                                            <span class="fw-bolder">{{ $booking->roomType->name }}</span>
                                        </td>
                                        <!--begin::Status=-->
                                        <td class="pe-0" data-order="Failed">
                                            <select class="status-select form-select form-select-sm mb-2" name="status"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="Select an option"
                                                data-url="{{ route('bookings.update', ['booking' => $booking->id]) }}">
                                                <option value="pending" @if ($booking->status === 'pending') selected @endif>
                                                    {{ __('messages.pending') }}
                                                </option>
                                                <option value="confirmed" @if ($booking->status === 'confirmed') selected @endif>
                                                    {{ __('messages.confirmed') }}
                                                </option>
                                                <option value="paid" @if ($booking->status === 'paid') selected @endif>
                                                    {{ __('messages.paid') }}
                                                </option>
                                                <option value="canceled" @if ($booking->status === 'canceled') selected @endif>
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
                                        <!--end::Status=-->
                                        <!--end::Total=-->
                                        <!--begin::Date Added=-->
                                        <td class="text-center" data-order="2021-12-25">
                                            <span class="fw-bolder">{{ $booking->checkin->format('d/m/Y') }}</span>
                                        </td>
                                        <!--end::Date Added=-->
                                        <!--begin::Status=-->
                                        <td class="text-center" data-order="Failed">
                                            <span class="fw-bolder">{{ $booking->checkout->format('d/m/Y') }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="fw-bolder">@money($booking->money_total, 'VND')</span>
                                        </td>
                                        <!--end::Status=-->
                                        <!--begin::Action=-->
                                        <td class="text-center">
                                            {{-- <a href="{{ route('orders.show', ['order' => $order->id]) }}"
                                                class="menu-link px-3"><i class="fas fa-eye"></i></a> --}}
                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                                data-kt-menu-trigger="click"
                                                data-kt-menu-placement="bottom-end">{{ __('messages.actions') }}
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                {{-- <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('orders.show', ['order' => $order->id]) }}"
                                                        class="menu-link px-3">{{ __('messages.view_detail') }}</a>
                                                </div>
                                                <!--end::Menu item--> --}}
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                    <!--end::Table row-->
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
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
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
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
                        // window.localStorage.setItem('success',
                        //     'Cập nhật trạng thái thành công!');
                        // window.location.href = '/bookings';
                    },
                });
            }
        });
    </script>
    <!--end::Page Custom Javascript-->
@endpush
