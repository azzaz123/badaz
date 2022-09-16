<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateProductSettingsAPIRequest extends FormRequest
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
            'data.*.marketplace_sku' => ['nullable', 'integer'],
            'data.*.marketplace_variations' => ['nullable', 'integer'],
            'data.*.marketplace_shipping' => ['nullable', 'integer'],
            'data.*.marketplace_product_location' => ['nullable', 'integer'],
            'data.*.classified_price' => ['nullable', 'integer'],
            'data.*.classified_price_required' => ['nullable', 'integer'],
            'data.*.classified_product_location' => ['nullable', 'integer'],
            'data.*.classified_external_link' => ['nullable', 'integer'],
            'data.*.physical_demo_url' => ['nullable', 'integer'],
            'data.*.physical_video_preview' => ['nullable', 'integer'],
            'data.*.physical_audio_preview' => ['nullable', 'integer'],
            'data.*.digital_demo_url' => ['nullable', 'integer'],
            'data.*.digital_video_preview' => ['nullable', 'integer'],
            'data.*.digital_audio_preview' => ['nullable', 'integer'],
            'data.*.digital_allowed_file_extensions' => ['nullable', 'string'],
            'data.*.sitemap_frequency' => ['nullable', 'string'],
            'data.*.sitemap_last_modification' => ['nullable', 'string'],
            'data.*.sitemap_priority' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
