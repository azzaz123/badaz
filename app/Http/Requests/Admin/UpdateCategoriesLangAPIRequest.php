<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriesLangAPIRequest extends FormRequest
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
            'category_id' => ['nullable', 'integer'],
            'lang_id' => ['nullable', 'integer'],
            'name' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
