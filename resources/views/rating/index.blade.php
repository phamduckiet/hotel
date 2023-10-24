@extends('layouts.admin')

@section('content')
    @include('components.admin.header', [
        'parent' => null,
        'child' => 'Đánh giá - bình luận',
    ])
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                @if (Session::get('success'))
                    <input id="success-message" type="hidden" value="{{ Session::get('success') }}" />
                @endif
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
                                <input type="text" data-kt-ecommerce-product-filter="search"
                                    class="form-control form-control-solid w-250px ps-14"
                                    placeholder="{{ __('messages.search') }}" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px">Khách hàng</th>
                                    <th class="min-w-100px">Đánh giá</th>
                                    <th class="min-w-100px">Bình luận</th>
                                    <th class="min-w-100px">Mã đặt phòng</th>
                                    <th class="min-w-100px">Trạng thái</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($ratings as $rating)
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Customer=-->
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!--begin:: Avatar -->
                                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                    <img src="{{ Avatar::create($rating->user->name)->toBase64() }}" />
                                                </div>
                                                <!--end::Avatar-->
                                                <div class="ms-2">
                                                    <!--begin::Title-->
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder">
                                                        {{ $rating->user->name }}</div>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                        </td>
                                        <!--end::Customer=-->
                                        <!--begin::Rating-->
                                        <td class="pe-0" data-order="rating-3">
                                            @include('components.view_rating', [
                                                'rating' => $rating->rating,
                                            ])
                                        </td>
                                        <!--end::Rating-->
                                        <!--begin::Qty=-->
                                        <td>
                                            <span class="fw-bolder">{{ $rating->comment }}</span>
                                        </td>
                                        <!--end::Qty=-->
                                        <!--begin::Price=-->
                                        <td class="pe-0">
                                            <a href=""
                                                class="text-gray-800 text-hover-primary fw-bolder">{{ $rating->rateable->code }}</a>
                                        </td>
                                        <!--end::Price=-->
                                        <!--begin::Status-->
                                        <td class="pe-0" data-order="rating-3">
                                            <select class="status-select form-select form-select-sm mb-2" name="status"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="Select an option"
                                                data-url="{{ route('ratings.update', ['rating' => $rating->id]) }}">
                                                <option value="1" @if ($rating->is_active == 1) selected @endif>
                                                    Hiển thị</option>
                                                <option value="0" @if ($rating->is_active == 0) selected @endif>Bị
                                                    ẩn</option>
                                            </select>
                                            <!--end::Select2-->
                                        </td>
                                        <!--end::Status-->
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
        $('.status-select').on('input', function(e) {
            const status = $(this).val();
            const url = $(this).data('url');

            if (status) {
                $.ajax({
                    type: 'PUT',
                    url,
                    data: {
                        status,
                    },
                    success: function() {
                        toastr.success('Cập nhật trạng thái thành công!');
                    },
                });
            }
        });

        // Datatable
        var table = document.querySelector('#kt_ecommerce_products_table');;
        var datatable;
        datatable = $(table).DataTable({
            "info": false,
            'order': [],
            'pageLength': 10,
            'columnDefs': [{
                orderable: false,
                targets: 4
            }, ]
        });
        const filterSearch = document.querySelector('[data-kt-ecommerce-product-filter="search"]');
        filterSearch.addEventListener('keyup', function(e) {
            datatable.search(e.target.value).draw();
        });
    </script>
    <!--end::Page Custom Javascript-->
@endpush
