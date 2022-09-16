<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateImagesAPIRequest extends FormRequest
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
            'data.*.image_default' => ['nullable', 'string'],
            'data.*.image_big' => ['nullable', 'string'],
            'data.*.image_small' => ['nullable', 'string'],
            'data.*.is_main' => ['nullable', 'integer'],
            'data.*.storage' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
