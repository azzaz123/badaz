<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomFieldsAPIRequest extends FormRequest
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
            'field_type' => ['nullable', 'string'],
            'row_width' => ['nullable', 'string'],
            'is_required' => ['nullable', 'integer'],
            'status' => ['nullable', 'integer'],
            'field_order' => ['nullable', 'integer'],
            'is_product_filter' => ['nullable', 'integer'],
            'product_filter_key' => ['nullable', 'string'],
            'sort_options' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
