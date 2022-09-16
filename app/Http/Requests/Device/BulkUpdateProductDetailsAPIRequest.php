<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateProductDetailsAPIRequest extends FormRequest
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
            'data.*.product_id' => ['nullable', 'integer'],
            'data.*.lang_id' => ['nullable', 'integer'],
            'data.*.title' => ['nullable', 'string'],
            'data.*.description' => ['nullable'],
            'data.*.seo_title' => ['nullable', 'string'],
            'data.*.seo_description' => ['nullable', 'string'],
            'data.*.seo_keywords' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
