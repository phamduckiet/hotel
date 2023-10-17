<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Rules\Password;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'password' => [
                'required',
                'string',
                new Password,
                'confirmed',
            ],
            'role' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
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
            'name' => __('messages.name'),
            'email' => 'Email',
            'password' => __('messages.password'),
            'role' => __('messages.role'),
            'avatar' => __('messages.avatar'),
        ];
    }
}
