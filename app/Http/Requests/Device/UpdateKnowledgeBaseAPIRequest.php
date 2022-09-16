<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKnowledgeBaseAPIRequest extends FormRequest
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
            'title' => ['nullable', 'string'],
            'slug' => ['nullable', 'string'],
            'content' => ['nullable'],
            'category_id' => ['nullable', 'string'],
            'content_order' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
