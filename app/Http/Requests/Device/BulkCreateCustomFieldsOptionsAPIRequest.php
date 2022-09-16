<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateCustomFieldsOptionsAPIRequest extends FormRequest
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
            'data.*.field_id' => ['nullable', 'integer'],
            'data.*.option_key' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
