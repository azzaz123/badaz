<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateVariationsAPIRequest extends FormRequest
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
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.parent_id' => ['nullable', 'integer'],
            'data.*.label_names' => ['nullable'],
            'data.*.variation_type' => ['nullable', 'string'],
            'data.*.insert_type' => ['nullable', 'string'],
            'data.*.option_display_type' => ['nullable', 'string'],
            'data.*.show_images_on_slider' => ['nullable', 'integer'],
            'data.*.use_different_price' => ['nullable', 'integer'],
            'data.*.is_visible' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
