<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShippingAddressesAPIRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => ['nullable', 'integer'],
            'title' => ['nullable', 'string'],
            'first_name' => ['nullable', 'string'],
            'last_name' => ['nullable', 'string'],
            'email' => ['nullable', 'string'],
            'phone_number' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'country_id' => ['nullable', 'string'],
            'state_id' => ['nullable', 'integer'],
            'city' => ['nullable', 'string'],
            'zip_code' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
