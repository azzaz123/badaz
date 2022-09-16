<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateCategoriesLangAPIRequest extends FormRequest
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
            'data.*.category_id' => ['nullable', 'integer'],
            'data.*.lang_id' => ['nullable', 'integer'],
            'data.*.name' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
