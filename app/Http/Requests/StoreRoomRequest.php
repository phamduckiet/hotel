<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
            'name' => 'required|unique:rooms|max:255',
            'avatar_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'type_id' => 'required|integer',
            'floor_id' => 'required|integer',
        ];
    }
    public function attributes()
    {
        return [
            'name' => __('messages.name'),
            'avatar_url' => __('messages.avatar_url'),
            'type_id' => __('messages.room_type'),
            'floor_id' => __('messages.floor'),
        ];
    }
}
