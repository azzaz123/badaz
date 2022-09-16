<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateMediaAPIRequest extends FormRequest
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
            'data.*.media_type' => ['nullable', 'string'],
            'data.*.file_name' => ['nullable', 'string'],
            'data.*.storage' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
