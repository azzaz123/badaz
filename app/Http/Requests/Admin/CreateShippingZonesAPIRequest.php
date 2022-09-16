<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateShippingZonesAPIRequest extends FormRequest
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
            'name_array' => ['nullable'],
            'user_id' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
