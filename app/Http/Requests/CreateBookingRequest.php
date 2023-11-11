<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'checkin' => 'required|date_format:d/m/Y',
            'checkout' => 'required|date_format:d/m/Y|after:checkin',
            'room_total' => 'required||numeric|min:1',
            'room_type_id' => 'required',
            'adults' => 'required|numeric|min:1',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'checkin' => 'Ngày nhận phòng',
            'checkout' => 'Ngày trả phòng',
            'room_total' => 'Số lượng phòng',
            'adults' => 'Số người lớn',
        ];
    }
}
