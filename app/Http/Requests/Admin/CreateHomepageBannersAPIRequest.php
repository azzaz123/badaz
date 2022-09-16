<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateHomepageBannersAPIRequest extends FormRequest
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
            'banner_url' => ['nullable', 'string'],
            'banner_image_path' => ['nullable', 'string'],
            'banner_order' => ['nullable', 'integer'],
            'banner_width' => ['nullable', 'integer'],
            'banner_location' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
