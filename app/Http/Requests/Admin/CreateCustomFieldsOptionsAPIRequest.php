<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomFieldsOptionsAPIRequest extends FormRequest
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
            'option_key' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
