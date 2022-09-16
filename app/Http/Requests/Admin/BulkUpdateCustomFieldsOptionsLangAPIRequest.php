<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateCustomFieldsOptionsLangAPIRequest extends FormRequest
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
            'data.*.option_id' => ['nullable', 'integer'],
            'data.*.lang_id' => ['nullable', 'integer'],
            'data.*.option_name' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
