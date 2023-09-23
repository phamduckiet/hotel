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
                                    <label class="required form-label">{{ __('messages.room_type_name') }}</label>
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
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">{{ __('messages.max_adults') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="max_adults"
                                        class="form-control mb-2 @error('max_adults') is-invalid @enderror"
                                        value="{{ old('max_adults') }}">
                                    <!--end::Input-->
                                    @error('max_adults')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">{{ __('messages.max_children') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="max_children"
                                        class="form-control mb-2 @error('max_children') is-invalid @enderror"
                                        value="{{ old('max_children') }}">
                                    <!--end::Input-->
                                    @error('max_children')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">{{ __('messages.price') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="price"
                                        class="form-control mb-2 @error('price') is-invalid @enderror"
                                        value="{{ old('max_children') }}">
                                    <!--end::Input-->
                                    @error('price')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div>
                                    <!--begin::Label-->
                                    <label class="form-label">{{ __('messages.description') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <div id="room-type-description-editor" class="min-h-200px mb-2"></div>
                                    <!--end::Editor-->
                                </div>
                                <input type="hidden" id="room-type-description" name="description"
                                    value="{{ old('description') }}" />
                                <!--end::Input group-->
                                @error('description')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
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
