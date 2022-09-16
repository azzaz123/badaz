<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLanguageTranslationsAPIRequest extends FormRequest
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
            'lang_id' => ['nullable', 'integer'],
            'label' => ['nullable', 'string'],
            'translation' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
