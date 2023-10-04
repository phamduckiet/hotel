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
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>{{ __('messages.avatar') }}</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body text-center pt-0">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-empty image-input-outline mb-3"
                                            data-kt-image-input="true"
                                            style="{{ 'background-image: url(' . asset('metronic/assets/media/svg/files/blank-image.svg') . ')' }}">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-150px h-150px"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg, .webp" />
                                                <!--end::Inputs-->
                                                <div id="error-message-avatar" class="error-message text-danger"></div>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">*.png, *.jpg, *.jpeg</div>
                                        <!--end::Description-->
                                        <div id="error-message-avatar_url" class="error-message text-danger"></div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
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
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{ __('messages.image') }}</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-2">
                                            <!--begin::Dropzone-->
                                            <div class="dropzone" id="add_room_media">
                                                <!--begin::Message-->
                                                <div class="dz-message needsclick">
                                                    <!--begin::Icon-->
                                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                    <!--end::Icon-->
                                                    <!--begin::Info-->
                                                    <div class="ms-4">
                                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">
                                                            {{ __('messages.tbimage') }}</h3>
                                                        <span class="fs-7 fw-bold text-gray-400">{{ __('messages.tb1image') }}</span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div>
                                            <!--end::Dropzone-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
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
