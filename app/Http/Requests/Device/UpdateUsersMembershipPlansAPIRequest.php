<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersMembershipPlansAPIRequest extends FormRequest
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
            'plan_id' => ['nullable', 'integer'],
            'plan_title' => ['nullable', 'string'],
            'number_of_ads' => ['nullable', 'integer'],
            'number_of_days' => ['nullable', 'integer'],
            'price' => ['nullable', 'integer'],
            'currency' => ['nullable', 'string'],
            'is_free' => ['nullable', 'integer'],
            'is_unlimited_number_of_ads' => ['nullable', 'integer'],
            'is_unlimited_time' => ['nullable', 'integer'],
            'payment_method' => ['nullable', 'string'],
            'payment_status' => ['nullable', 'string'],
            'plan_status' => ['nullable', 'integer'],
            'plan_start_date' => ['nullable'],
            'plan_end_date' => ['nullable'],
            'is_active' => ['boolean'],
        ];
    }
}
