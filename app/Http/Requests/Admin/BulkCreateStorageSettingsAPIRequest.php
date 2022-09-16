<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateStorageSettingsAPIRequest extends FormRequest
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
            'data.*.storage' => ['nullable', 'string'],
            'data.*.aws_key' => ['nullable', 'string'],
            'data.*.aws_secret' => ['nullable', 'string'],
            'data.*.aws_bucket' => ['nullable', 'string'],
            'data.*.aws_region' => ['nullable', 'string'],
            'data.*.aws_base_url' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
