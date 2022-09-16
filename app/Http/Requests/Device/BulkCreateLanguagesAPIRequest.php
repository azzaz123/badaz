<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateLanguagesAPIRequest extends FormRequest
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
            'data.*.name' => ['nullable', 'string'],
            'data.*.short_form' => ['nullable', 'string'],
            'data.*.language_code' => ['nullable', 'string'],
            'data.*.text_direction' => ['nullable', 'string'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.language_order' => ['nullable', 'integer'],
            'data.*.text_editor_lang' => ['nullable', 'string'],
            'data.*.flag_path' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
