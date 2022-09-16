<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateKnowledgeBaseAPIRequest extends FormRequest
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
            'data.*.title' => ['nullable', 'string'],
            'data.*.slug' => ['nullable', 'string'],
            'data.*.content' => ['nullable'],
            'data.*.category_id' => ['nullable', 'string'],
            'data.*.content_order' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
