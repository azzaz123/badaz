<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateFontsAPIRequest extends FormRequest
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
            'data.*.font_name' => ['nullable', 'string'],
            'data.*.font_url' => ['nullable', 'string'],
            'data.*.font_family' => ['nullable', 'string'],
            'data.*.is_default' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
