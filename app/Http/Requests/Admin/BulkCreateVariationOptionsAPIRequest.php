<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateVariationOptionsAPIRequest extends FormRequest
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
            'data.*.variation_id' => ['nullable', 'integer'],
            'data.*.parent_id' => ['nullable', 'integer'],
            'data.*.option_names' => ['nullable'],
            'data.*.stock' => ['nullable', 'integer'],
            'data.*.color' => ['nullable', 'string'],
            'data.*.price' => ['nullable', 'integer'],
            'data.*.discount_rate' => ['nullable', 'integer'],
            'data.*.is_default' => ['nullable', 'integer'],
            'data.*.use_default_price' => ['nullable', 'integer'],
            'data.*.no_discount' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
