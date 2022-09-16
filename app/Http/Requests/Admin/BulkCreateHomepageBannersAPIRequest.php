<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateHomepageBannersAPIRequest extends FormRequest
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
            'data.*.banner_url' => ['nullable', 'string'],
            'data.*.banner_image_path' => ['nullable', 'string'],
            'data.*.banner_order' => ['nullable', 'integer'],
            'data.*.banner_width' => ['nullable', 'integer'],
            'data.*.banner_location' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
