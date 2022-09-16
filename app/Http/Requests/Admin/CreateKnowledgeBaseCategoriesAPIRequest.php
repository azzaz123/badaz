<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateKnowledgeBaseCategoriesAPIRequest extends FormRequest
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
            'name' => ['nullable', 'string'],
            'slug' => ['nullable', 'string'],
            'category_order' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
