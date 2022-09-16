<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateShippingZoneMethodsAPIRequest extends FormRequest
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
            'data.*.name_array' => ['nullable'],
            'data.*.zone_id' => ['nullable', 'integer'],
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.method_type' => ['nullable', 'string'],
            'data.*.flat_rate_cost_calculation_type' => ['nullable', 'string'],
            'data.*.flat_rate_cost' => ['nullable', 'integer'],
            'data.*.flat_rate_class_costs_array' => ['nullable'],
            'data.*.local_pickup_cost' => ['nullable', 'integer'],
            'data.*.free_shipping_min_amount' => ['nullable', 'integer'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
