<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRoomTypeRequest extends FormRequest
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
            'checkin' => 'nullable|date_format:d/m/Y|after_or_equal:today',
            'checkout' => 'nullable|date_format:d/m/Y|after:checkin',
            'room_total' => 'nullable||numeric|min:1',
            'adults' => 'nullable|numeric|min:1',
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

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'checkin.after_or_equal' => 'Ngày nhận phòng phải bằng hoặc sau ngày hôm nay.',
        ];
    }
}
