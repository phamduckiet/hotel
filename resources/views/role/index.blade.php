@extends('layouts.admin')

@section('content')
    @include('components.admin.header', [
        'parent' => null,
        'child' => __('messages.roles'),
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
                @if ($errors->any())
                    <div class="alert alert-danger d-flex align-items-center">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button"
                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                            data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                        rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                        </button>
                    </div>
                @endif
                <!--begin::Row-->
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
                    @foreach ($roles as $role)
                        <!--begin::Col-->
                        <div class="col-md-4" id="{{ 'role-item-' . $role->id }}">
                            <!--begin::Card-->
                            <div class="card card-flush h-md-100">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>{{ $role->name }}</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-1">
                                    <!--begin::Permissions-->
                                    <div class="d-flex flex-column text-gray-600">
                                        @foreach ($role->permissions as $permission)
                                            <div class="d-flex align-items-center py-2">
                                                <span class="bullet bg-primary me-3"></span>{{ $permission->display_name }}
                                            </div>
                                        @endforeach
                                        @if ($role->permissions->count() === 0)
                                            <div class="d-flex align-items-center py-2">
                                                <span class="bullet bg-primary me-3"></span>Chưa có quyền nào
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Permissions-->
                                </div>
                                <!--end::Card body-->
                                <!--begin::Card footer-->
                                <div class="card-footer flex-wrap pt-0">
                                    <button type="button" class="btn btn-primary my-1 me-3" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_update_role_{{ $role->id }}">{{ __('messages.edit') }}</button>
                                    <button type="button" class="btn btn-light btn-active-light-primary my-1 delete-btn"
                                        data-url="{{ route('roles.destroy', ['role' => $role->id]) }}"
                                        data-id="{{ $role->id }}">{{ __('messages.delete') }}</button>
                                </div>
                                <!--end::Card footer-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Modal - Update role-->
                        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true"
                            id="kt_modal_update_role_{{ $role->id }}">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-750px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bolder">{{ __('messages.update_role') }}</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                        height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                        fill="black" />
                                                    <rect x="7.41422" y="6" width="16" height="2"
                                                        rx="1" transform="rotate(45 7.41422 6)" fill="black" />
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
                                        <form method="POST" action="{{ route('roles.update', ['role' => $role->id]) }}"
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
                                                        <span class="required">{{ __('messages.role_name') }}</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid"
                                                        placeholder="Enter a role name" name="name"
                                                        value="{{ $role->name }}" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Permissions-->
                                                <div class="fv-row">
                                                    <!--begin::Label-->
                                                    <label
                                                        class="fs-5 fw-bolder form-label mb-2">{{ __('messages.role_permissions') }}</label>
                                                    <!--end::Label-->
                                                    <!--begin::Table wrapper-->
                                                    <div class="table-responsive">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                            <!--begin::Table body-->
                                                            <tbody class="text-gray-600 fw-bold">
                                                                @foreach ($permissions as $permission)
                                                                    <!--end::Table row-->
                                                                    <tr>
                                                                        <!--begin::Label-->
                                                                        <td class="text-gray-800">
                                                                            {{ $permission->display_name }}</td>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input group-->
                                                                        <td>
                                                                            <!--begin::Wrapper-->
                                                                            <div class="d-flex">
                                                                                <!--begin::Checkbox-->
                                                                                <label
                                                                                    class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                    @if ($role->permissionNames->contains($permission->name))
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value="{{ $permission->name }}"
                                                                                            name="permissions[]" checked />
                                                                                    @else
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value="{{ $permission->name }}"
                                                                                            name="permissions[]" />
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
                                                    <span class="indicator-label">{{ __('messages.save_changes') }}</span>
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
                        <!--end::Modal - Update role-->
                    @endforeach
                    <!--begin::Add new card-->
                    <div class="ol-md-4">
                        <!--begin::Card-->
                        <div class="card h-md-100">
                            <!--begin::Card body-->
                            <div class="card-body d-flex flex-center">
                                <!--begin::Button-->
                                <button type="button" class="btn btn-clear d-flex flex-column flex-center"
                                    data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                    <!--begin::Illustration-->
                                    <img src="{{ asset('metronic/assets/media/illustrations/sketchy-1/4.png') }}"
                                        alt="" class="mw-100 mh-150px mb-7" />
                                    <!--end::Illustration-->
                                    <!--begin::Label-->
                                    <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">
                                        {{ __('messages.add_role') }}</div>
                                    <!--end::Label-->
                                </button>
                                <!--begin::Button-->
                            </div>
                            <!--begin::Card body-->
                        </div>
                        <!--begin::Card-->
                    </div>
                    <!--begin::Add new card-->
                </div>
                <!--end::Row-->
                <!--begin::Modal - Add role-->
                <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true" id="kt_modal_add_role">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-750px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">{{ __('messages.add_role') }}</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                fill="black" />
                                            <rect x="7.41422" y="6" width="16" height="2"
                                                rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-lg-5 my-7">
                                <!--begin::Form-->
                                <form method="POST" action="{{ route('roles.store') }}" id="kt_modal_add_role_form"
                                    class="form">
                                    @csrf
                                    <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll"
                                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                        data-kt-scroll-max-height="auto"
                                        data-kt-scroll-dependencies="#kt_modal_add_role_header"
                                        data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bolder form-label mb-2">
                                                <span class="required">{{ __('messages.role_name') }}</span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid"
                                                placeholder="{{ __('messages.role_name') }}" name="name" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Permissions-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label
                                                class="fs-5 fw-bolder form-label mb-2">{{ __('messages.role_permissions') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Table wrapper-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                    <!--begin::Table body-->
                                                    <tbody class="text-gray-600 fw-bold">
                                                        @foreach ($permissions as $permission)
                                                            <!--end::Table row-->
                                                            <tr>
                                                                <!--begin::Label-->
                                                                <td class="text-gray-800">
                                                                    {{ $permission->display_name }}</td>
                                                                <!--end::Label-->
                                                                <!--begin::Input group-->
                                                                <td>
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex">
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                            <input class="form-check-input"
                                                                                type="checkbox"
                                                                                value="{{ $permission->name }}"
                                                                                name="permissions[]" />
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
                                            <span class="indicator-label">{{ __('messages.save_changes') }}</span>
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
                <!--end::Modal - Add role-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@push('scripts')
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('metronic/assets/js/custom/apps/user-management/roles/list/add.js') }}"></script>
    <script src="{{ asset('metronic/assets/js/custom/apps/user-management/roles/list/update-role.js') }}"></script>
    <script src="{{ asset('resources/js/role/index.js') }}"></script>
    <!--end::Page Custom Javascript-->
@endpush
