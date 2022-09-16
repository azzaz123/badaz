<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateKnowledgeBaseCategoriesAPIRequest extends FormRequest
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
            'data.*.name' => ['nullable', 'string'],
            'data.*.slug' => ['nullable', 'string'],
            'data.*.category_order' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
