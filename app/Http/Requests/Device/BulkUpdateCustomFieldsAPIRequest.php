<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateCustomFieldsAPIRequest extends FormRequest
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
            'data.*.name_array' => ['nullable'],
            'data.*.field_type' => ['nullable', 'string'],
            'data.*.row_width' => ['nullable', 'string'],
            'data.*.is_required' => ['nullable', 'integer'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.field_order' => ['nullable', 'integer'],
            'data.*.is_product_filter' => ['nullable', 'integer'],
            'data.*.product_filter_key' => ['nullable', 'string'],
            'data.*.sort_options' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
