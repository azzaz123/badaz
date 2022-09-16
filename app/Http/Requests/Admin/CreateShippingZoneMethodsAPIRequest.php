<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateShippingZoneMethodsAPIRequest extends FormRequest
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
            'zone_id' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'method_type' => ['nullable', 'string'],
            'flat_rate_cost_calculation_type' => ['nullable', 'string'],
            'flat_rate_cost' => ['nullable', 'integer'],
            'flat_rate_class_costs_array' => ['nullable'],
            'local_pickup_cost' => ['nullable', 'integer'],
            'free_shipping_min_amount' => ['nullable', 'integer'],
            'status' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
