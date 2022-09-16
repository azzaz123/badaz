<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductSettingsAPIRequest extends FormRequest
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
            'marketplace_sku' => ['nullable', 'integer'],
            'marketplace_variations' => ['nullable', 'integer'],
            'marketplace_shipping' => ['nullable', 'integer'],
            'marketplace_product_location' => ['nullable', 'integer'],
            'classified_price' => ['nullable', 'integer'],
            'classified_price_required' => ['nullable', 'integer'],
            'classified_product_location' => ['nullable', 'integer'],
            'classified_external_link' => ['nullable', 'integer'],
            'physical_demo_url' => ['nullable', 'integer'],
            'physical_video_preview' => ['nullable', 'integer'],
            'physical_audio_preview' => ['nullable', 'integer'],
            'digital_demo_url' => ['nullable', 'integer'],
            'digital_video_preview' => ['nullable', 'integer'],
            'digital_audio_preview' => ['nullable', 'integer'],
            'digital_allowed_file_extensions' => ['nullable', 'string'],
            'sitemap_frequency' => ['nullable', 'string'],
            'sitemap_last_modification' => ['nullable', 'string'],
            'sitemap_priority' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
