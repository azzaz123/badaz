<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateMembershipPlansAPIRequest extends FormRequest
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
            'data.*.title_array' => ['nullable'],
            'data.*.number_of_ads' => ['nullable', 'integer'],
            'data.*.number_of_days' => ['nullable', 'integer'],
            'data.*.price' => ['nullable', 'integer'],
            'data.*.is_free' => ['nullable', 'integer'],
            'data.*.is_unlimited_number_of_ads' => ['nullable', 'integer'],
            'data.*.is_unlimited_time' => ['nullable', 'integer'],
            'data.*.features_array' => ['nullable'],
            'data.*.plan_order' => ['nullable', 'integer'],
            'data.*.is_popular' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
