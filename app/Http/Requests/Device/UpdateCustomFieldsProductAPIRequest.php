<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomFieldsProductAPIRequest extends FormRequest
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
            'field_id' => ['nullable', 'integer'],
            'product_id' => ['nullable', 'integer'],
            'product_filter_key' => ['nullable', 'string'],
            'field_value' => ['nullable', 'string'],
            'selected_option_id' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
