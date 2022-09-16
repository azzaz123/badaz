<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVariationsAPIRequest extends FormRequest
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
            'product_id' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'parent_id' => ['nullable', 'integer'],
            'label_names' => ['nullable'],
            'variation_type' => ['nullable', 'string'],
            'insert_type' => ['nullable', 'string'],
            'option_display_type' => ['nullable', 'string'],
            'show_images_on_slider' => ['nullable', 'integer'],
            'use_different_price' => ['nullable', 'integer'],
            'is_visible' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
