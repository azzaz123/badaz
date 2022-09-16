<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateLanguagesAPIRequest extends FormRequest
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
            'name' => ['nullable', 'string'],
            'short_form' => ['nullable', 'string'],
            'language_code' => ['nullable', 'string'],
            'text_direction' => ['nullable', 'string'],
            'status' => ['nullable', 'integer'],
            'language_order' => ['nullable', 'integer'],
            'text_editor_lang' => ['nullable', 'string'],
            'flag_path' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
