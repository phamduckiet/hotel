@extends('layouts.admin')

@section('content')
    @include('components.admin.header', [
        'parent' => null,
        'child' => __('messages.permissions'),
    ])
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            @if (Session::get('success'))
                <input id="success-message" type="hidden" value="{{ Session::get('success') }}" />
            @endif
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card card-flush">
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">{{ __('messages.permission_name') }}</th>
                                    <th class="min-w-250px">{{ __('messages.assign_to') }}</th>
                                    <th class="text-center min-w-100px">{{ __('messages.actions') }}</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <!--begin::Name=-->
                                        <td>{{ $permission->display_name }}</td>
                                        <!--end::Name=-->
                                        <!--begin::Assigned to=-->
                                        <td>
                                            @foreach ($permission->roles as $role)
                                                <div class="badge badge-light-primary fs-7 m-1">{{ $role->name }}</div>
                                            @endforeach
                                        </td>
                                        <!--end::Assigned to=-->
                                        <!--begin::Action=-->
                                        <td>
                                            <div class="text-center">
                                                <!--begin::Update-->
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_update_permission_{{ $permission->id }}">
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                                <!--end::Update-->
                                            </div>
                                            <!--begin::Modal - Update permissions-->
                                            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"
                                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"
                                                id="kt_modal_update_permission_{{ $permission->id }}">
                                                <!--begin::Modal dialog-->
                                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                                    <!--begin::Modal content-->
                                                    <div class="modal-content">
                                                        <!--begin::Modal header-->
                                                        <div class="modal-header">
                                                            <!--begin::Modal title-->
                                                            <h2 class="fw-bolder">{{ __('messages.update_permission') }}
                                                            </h2>
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
                                                        <div class="modal-body scroll-y mx-5 my-7">
                                                            <!--begin::Form-->
                                                            <form method="POST"
                                                                action="{{ route('permissions.update', ['permission' => $permission->id]) }}"
                                                                id="kt_modal_update_role_form" class="form">
                                                                @csrf
                                                                @method('PUT')
                                                                <!--begin::Scroll-->
                                                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                                    id="kt_modal_update_role_scroll" data-kt-scroll="true"
                                                                    data-kt-scroll-activate="{default: false, lg: true}"
                                                                    data-kt-scroll-max-height="auto"
                                                                    data-kt-scroll-dependencies="#kt_modal_update_role_header"
                                                                    data-kt-scroll-wrappers="#kt_modal_update_role_scroll"
                                                                    data-kt-scroll-offset="300px">
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-10">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-5 fw-bolder form-label mb-2">
                                                                            <span
                                                                                class="required">{{ __('messages.permission_name') }}</span>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input class="form-control form-control-solid"
                                                                            readonly
                                                                            value="{{ $permission->display_name }}" />
                                                                        <!--end::Input-->
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Permissions-->
                                                                    <div class="fv-row">
                                                                        <!--begin::Label-->
                                                                        <label
                                                                            class="fs-5 fw-bolder form-label mb-2">{{ __('messages.assign_to_roles') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Table wrapper-->
                                                                        <div class="table-responsive">
                                                                            <!--begin::Table-->
                                                                            <table
                                                                                class="table align-middle table-row-dashed fs-6 gy-5">
                                                                                <!--begin::Table body-->
                                                                                <tbody class="text-gray-600 fw-bold">
                                                                                    @foreach ($roles as $role)
                                                                                        <!--end::Table row-->
                                                                                        <tr>
                                                                                            <!--begin::Label-->
                                                                                            <td class="text-gray-800">
                                                                                                {{ $role->name }}
                                                                                            </td>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input group-->
                                                                                            <td>
                                                                                                <!--begin::Wrapper-->
                                                                                                <div class="d-flex">
                                                                                                    <!--begin::Checkbox-->
                                                                                                    <label
                                                                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                                        @if ($permission->roleNames->contains($role->name))
                                                                                                            <input
                                                                                                                class="form-check-input"
                                                                                                                type="checkbox"
                                                                                                                value="{{ $role->name }}"
                                                                                                                name="roles[]"
                                                                                                                checked />
                                                                                                        @else
                                                                                                            <input
                                                                                                                class="form-check-input"
                                                                                                                type="checkbox"
                                                                                                                value="{{ $role->name }}"
                                                                                                                name="roles[]" />
                                                                                                        @endif
                                                                                                    </label>
                                                                                                    <!--end::Checkbox-->
                                                                                                </div>
                                                                                                <!--end::Wrapper-->
                                                                                            </td>
                                                                                            <!--end::Input group-->
                                                                                        </tr>
                                                                                        <!--end::Table row-->
                                                                                    @endforeach
                                                                                </tbody>
                                                                                <!--end::Table body-->
                                                                            </table>
                                                                            <!--end::Table-->
                                                                        </div>
                                                                        <!--end::Table wrapper-->
                                                                    </div>
                                                                    <!--end::Permissions-->
                                                                </div>
                                                                <!--end::Scroll-->
                                                                <!--begin::Actions-->
                                                                <div class="text-end pt-15">
                                                                    <button type="reset" class="btn btn-light me-3"
                                                                        data-bs-dismiss="modal">{{ __('messages.cancel') }}</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        data-kt-roles-modal-action="submit">
                                                                        <span
                                                                            class="indicator-label">{{ __('messages.save_changes') }}</span>
                                                                        <span class="indicator-progress">Please wait...
                                                                            <span
                                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                    </button>
                                                                </div>
                                                                <!--end::Actions-->
                                                            </form>
                                                            <!--end::Form-->
                                                        </div>
                                                        <!--end::Modal body-->
                                                    </div>
                                                    <!--end::Modal content-->
                                                </div>
                                                <!--end::Modal dialog-->
                                            </div>
                                            <!--end::Modal - Update permissions-->
                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
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
    <script src="{{ asset('metronic/assets/js/custom/apps/user-management/permissions/list.js') }}"></script>
    <script src="{{ asset('metronic/assets/js/custom/apps/user-management/permissions/add-permission.js') }}"></script>
    <script src="{{ asset('metronic/assets/js/custom/apps/user-management/permissions/update-permission.js') }}"></script>
    <!--end::Page Custom Javascript-->
@endpush
