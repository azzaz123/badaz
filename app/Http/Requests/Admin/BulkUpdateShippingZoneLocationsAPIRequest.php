<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateShippingZoneLocationsAPIRequest extends FormRequest
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
            'data.*.zone_id' => ['nullable', 'integer'],
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.continent_code' => ['nullable', 'string'],
            'data.*.country_id' => ['nullable', 'integer'],
            'data.*.state_id' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
