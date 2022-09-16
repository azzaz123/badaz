<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFontsAPIRequest extends FormRequest
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
            'font_name' => ['nullable', 'string'],
            'font_url' => ['nullable', 'string'],
            'font_family' => ['nullable', 'string'],
            'is_default' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
