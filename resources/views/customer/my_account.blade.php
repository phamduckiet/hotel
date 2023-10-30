@extends('layouts.customer')

@section('content')
    <!-- Content bg area start -->
    <div class="contact-bg overview-bgi">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form content box start -->
                    <div class="form-content-box" style="max-width:550px;text-align:left;margin-top:100px;">
                        <!-- details -->
                        <div class="details">
                            <div style="text-align:center;">
                                <h3>Thông tin tài khoản</h3>
                            </div>
                            <!-- Form start-->
                            <form method="POST" action="{{ route('user-profile-information.update') }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="form-label">Họ tên <span class="required">*</span></label>
                                    <input type="text" name="name" class="input-text"
                                        value="{{ auth()->user()->name }}" placeholder="Họ tên">
                                    @error('name', 'updateProfileInformation')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email <span class="required">*</span></label>
                                    <input type="email" name="email" class="input-text"
                                        value="{{ auth()->user()->email }}" placeholder="Email">
                                    @error('email', 'updateProfileInformation')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Số điện thoại <span
                                            class="required">*</span></label>
                                    <input type="text" name="phone_number" value="{{ auth()->user()->customer?->phone }}"
                                        class="input-text" placeholder="Số điện thoại">
                                    @error('phone_number', 'updateProfileInformation')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="mb-0">
                                    <button type="submit"
                                        class="btn-md btn-theme btn-block">{{ __('messages.save_changes') }}</button>
                                </div>
                            </form>
                            <!-- Form end-->
                        </div>
                    </div>
                    <!-- Form content box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content bg area end -->
@endsection

@push('styles')
    <style>
        .form-label {
            font-weight: 500;
            margin-bottom: 10px;
        }

        .form-label span {
            color: red;
        }
    </style>
@endpush
