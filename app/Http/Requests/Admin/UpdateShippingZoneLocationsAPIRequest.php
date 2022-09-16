<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShippingZoneLocationsAPIRequest extends FormRequest
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
            'zone_id' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'continent_code' => ['nullable', 'string'],
            'country_id' => ['nullable', 'integer'],
            'state_id' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
