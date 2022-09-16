<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVariationOptionsAPIRequest extends FormRequest
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
            'variation_id' => ['nullable', 'integer'],
            'parent_id' => ['nullable', 'integer'],
            'option_names' => ['nullable'],
            'stock' => ['nullable', 'integer'],
            'color' => ['nullable', 'string'],
            'price' => ['nullable', 'integer'],
            'discount_rate' => ['nullable', 'integer'],
            'is_default' => ['nullable', 'integer'],
            'use_default_price' => ['nullable', 'integer'],
            'no_discount' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
