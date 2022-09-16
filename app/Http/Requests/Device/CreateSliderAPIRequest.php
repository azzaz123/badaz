<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateSliderAPIRequest extends FormRequest
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
            'lang_id' => ['nullable', 'integer'],
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'link' => ['nullable'],
            'item_order' => ['nullable', 'integer'],
            'button_text' => ['nullable', 'string'],
            'animation_title' => ['nullable', 'string'],
            'animation_description' => ['nullable', 'string'],
            'animation_button' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'image_mobile' => ['nullable', 'string'],
            'text_color' => ['nullable', 'string'],
            'button_color' => ['nullable', 'string'],
            'button_text_color' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
