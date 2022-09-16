<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateStorageSettingsAPIRequest extends FormRequest
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
            'storage' => ['nullable', 'string'],
            'aws_key' => ['nullable', 'string'],
            'aws_secret' => ['nullable', 'string'],
            'aws_bucket' => ['nullable', 'string'],
            'aws_region' => ['nullable', 'string'],
            'aws_base_url' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
