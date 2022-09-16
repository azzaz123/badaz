<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateUsersMembershipPlansAPIRequest extends FormRequest
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
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.plan_id' => ['nullable', 'integer'],
            'data.*.plan_title' => ['nullable', 'string'],
            'data.*.number_of_ads' => ['nullable', 'integer'],
            'data.*.number_of_days' => ['nullable', 'integer'],
            'data.*.price' => ['nullable', 'integer'],
            'data.*.currency' => ['nullable', 'string'],
            'data.*.is_free' => ['nullable', 'integer'],
            'data.*.is_unlimited_number_of_ads' => ['nullable', 'integer'],
            'data.*.is_unlimited_time' => ['nullable', 'integer'],
            'data.*.payment_method' => ['nullable', 'string'],
            'data.*.payment_status' => ['nullable', 'string'],
            'data.*.plan_status' => ['nullable', 'integer'],
            'data.*.plan_start_date' => ['nullable'],
            'data.*.plan_end_date' => ['nullable'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
