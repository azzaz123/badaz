<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateMembershipPlansAPIRequest extends FormRequest
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
            'title_array' => ['nullable'],
            'number_of_ads' => ['nullable', 'integer'],
            'number_of_days' => ['nullable', 'integer'],
            'price' => ['nullable', 'integer'],
            'is_free' => ['nullable', 'integer'],
            'is_unlimited_number_of_ads' => ['nullable', 'integer'],
            'is_unlimited_time' => ['nullable', 'integer'],
            'features_array' => ['nullable'],
            'plan_order' => ['nullable', 'integer'],
            'is_popular' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
