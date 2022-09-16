<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateFontsAPIRequest extends FormRequest
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
