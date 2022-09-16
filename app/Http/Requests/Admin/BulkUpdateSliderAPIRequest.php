<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateSliderAPIRequest extends FormRequest
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
            'data.*.description' => ['nullable', 'string'],
            'data.*.link' => ['nullable'],
            'data.*.item_order' => ['nullable', 'integer'],
            'data.*.button_text' => ['nullable', 'string'],
            'data.*.animation_title' => ['nullable', 'string'],
            'data.*.animation_description' => ['nullable', 'string'],
            'data.*.animation_button' => ['nullable', 'string'],
            'data.*.image' => ['nullable', 'string'],
            'data.*.image_mobile' => ['nullable', 'string'],
            'data.*.text_color' => ['nullable', 'string'],
            'data.*.button_color' => ['nullable', 'string'],
            'data.*.button_text_color' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
