<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdatePagesAPIRequest extends FormRequest
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
            'data.*.description' => ['nullable', 'string'],
            'data.*.keywords' => ['nullable', 'string'],
            'data.*.page_content' => ['nullable'],
            'data.*.page_order' => ['nullable', 'integer'],
            'data.*.visibility' => ['nullable', 'integer'],
            'data.*.title_active' => ['nullable', 'integer'],
            'data.*.location' => ['nullable', 'string'],
            'data.*.is_custom' => ['nullable', 'integer'],
            'data.*.page_default_name' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
