<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class ProductSettingsResource extends BaseAPIResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $fieldsFilter = $request->get('fields');
        if (!empty($fieldsFilter) || $request->get('include')) {
            return $this->resource->toArray();
        }

        return [
            'id' => $this->id,
            'marketplace_sku' => $this->marketplace_sku,
            'marketplace_variations' => $this->marketplace_variations,
            'marketplace_shipping' => $this->marketplace_shipping,
            'marketplace_product_location' => $this->marketplace_product_location,
            'classified_price' => $this->classified_price,
            'classified_price_required' => $this->classified_price_required,
            'classified_product_location' => $this->classified_product_location,
            'classified_external_link' => $this->classified_external_link,
            'physical_demo_url' => $this->physical_demo_url,
            'physical_video_preview' => $this->physical_video_preview,
            'physical_audio_preview' => $this->physical_audio_preview,
            'digital_demo_url' => $this->digital_demo_url,
            'digital_video_preview' => $this->digital_video_preview,
            'digital_audio_preview' => $this->digital_audio_preview,
            'digital_allowed_file_extensions' => $this->digital_allowed_file_extensions,
            'sitemap_frequency' => $this->sitemap_frequency,
            'sitemap_last_modification' => $this->sitemap_last_modification,
            'sitemap_priority' => $this->sitemap_priority,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
