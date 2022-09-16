<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateCouponsUsedAPIRequest extends FormRequest
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
            'order_id' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'coupon_code' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
