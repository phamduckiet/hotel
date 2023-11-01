@extends('layouts.admin')
@section('content')
    @include('components.admin.header', ['parent' => null, 'child' => __('messages.room_types')])
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
                                <input type="text" data-room-type-filter="search"
                                    class="form-control form-control-solid w-250px ps-14"
                                    placeholder="{{ __('messages.search') }}" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <a href="{{ route('room-types.create') }}"
                                class="btn btn-primary">{{ __('messages.add_room_type') }}</a>
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="room_type_list_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-center text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th style="color: black" class="min-w-100px">{{ __('messages.room_types') }}</th>
                                    <th style="color: black" class="min-w-100px">Giá</th>
                                    <th style="color: black" class="min-w-100px">Số người lớn</th>
                                    <th style="color: black" class="min-w-100px">Số trẻ em</th>
                                    <th style="color: black" class="text-center min-w-150px">{{ __('messages.actions') }}
                                    </th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($roomTypes as $roomType)
                                    <!--begin::Table row-->
                                    <tr style="color: black" id="{{ 'room-type-item-' . $roomType->id }}">
                                        <!--begin::Category=-->
                                        <td class="text-center">
                                            <div class="d-flex align-items-center">
                                                <!--begin::Thumbnail-->
                                                <a href="#" class="symbol symbol-50px">
                                                    <span class="symbol-label"
                                                        style="{{ 'background-image:url(' . asset($roomType->avatar_link) . ');' }}"></span>
                                                </a>
                                                <!--end::Thumbnail-->
                                                <div class="ms-5">
                                                    <!--begin::Title-->
                                                    <a href="#"
                                                        class="text-gray-800 text-hover-primary fs-5 fw-bolder"
                                                        data-kt-ecommerce-category-filter="category_name">{{ $roomType->name }}</a>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div>@money($roomType->price, 'VND')</div>
                                        </td>
                                        <td class="text-center">
                                            <div>{{ $roomType->max_adults }}</div>
                                        </td>
                                        <td class="text-center">
                                            <div>{{ $roomType->max_children }}</div>
                                        </td>
                                        <!--begin::Actio{-->
                                        <td class="text-center pt-9">
                                            <a href="{{ route('room.detail', ['room_type' => $roomType->id]) }}"
                                                class="btn btn-icon btn-secondary" target="_blank"><i
                                                    class="fas fa-eye fs-4"></i></a>
                                            <a href="{{ route('room-types.edit', [$roomType->id]) }}"
                                                class="btn btn-icon btn-warning"><i class="fas fa-pen fs-4"></i></a>
                                            <a href="#" class="btn btn-icon btn-danger delete-btn"
                                                data-url="{{ route('room-types.destroy', ['room_type' => $roomType->id]) }}"
                                                data-id="{{ $roomType->id }}"><i
                                                    data-url="{{ route('room-types.destroy', ['room_type' => $roomType->id]) }}"
                                                    data-id="{{ $roomType->id }}" class="fas fa-trash fs-4"></i>
                                            </a>
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
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('resources/js/room-type/index.js') }}"></script>
    <!--end::Page Custom Javascript-->
@endpush
