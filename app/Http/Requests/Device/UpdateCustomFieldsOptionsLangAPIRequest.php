<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomFieldsOptionsLangAPIRequest extends FormRequest
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
            'option_id' => ['nullable', 'integer'],
            'lang_id' => ['nullable', 'integer'],
            'option_name' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
