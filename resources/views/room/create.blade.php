@extends('layouts.admin')
@section('content')
    @include('components.admin.header', [
        'parent' => __('messages.room_types'),
        'child' => __('messages.add_room_type'),
    ])
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <form method="POST" action="{{ route('room-types.store') }}" enctype='multipart/form-data'
                    id="add_room_type_form" class="form d-flex flex-column flex-lg-row">
                    @csrf
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">{{ __('messages.room_name') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name"
                                        class="form-control mb-2 @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}">
                                    <!--end::Input-->
                                    @error('name')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::General options-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('room-types.index') }}" id="kt_ecommerce_add_product_cancel"
                                class="btn btn-light me-5">{{ __('messages.cancel') }}</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="submit-btn" class="btn btn-primary">
                                <span class="indicator-label">{{ __('messages.save_changes') }}</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Main column-->
                </form>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@push('scripts')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('metronic/assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('metronic/assets/js/custom/apps/ecommerce/catalog/save-category.js') }} "></script>
    <script src="{{ asset('resources/js/room-type/create.js') }}"></script>
    <!--end::Page Custom Javascript-->
@endpush
