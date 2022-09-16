<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateLanguageTranslationsAPIRequest extends FormRequest
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
            'data.*.lang_id' => ['nullable', 'integer'],
            'data.*.label' => ['nullable', 'string'],
            'data.*.translation' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
