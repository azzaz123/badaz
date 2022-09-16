<?php

namespace App\Repositories;

use App\Models\ProductSettings;

class ProductSettingsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'marketplace_sku',
        'marketplace_variations',
        'marketplace_shipping',
        'marketplace_product_location',
        'classified_price',
        'classified_price_required',
        'classified_product_location',
        'classified_external_link',
        'physical_demo_url',
        'physical_video_preview',
        'physical_audio_preview',
        'digital_demo_url',
        'digital_video_preview',
        'digital_audio_preview',
        'digital_allowed_file_extensions',
        'sitemap_frequency',
        'sitemap_last_modification',
        'sitemap_priority',
        'is_active',
        'created_at',
        'updated_at',
        'added_by',
        'updated_by',
    ];

    /**
     * @return string[]
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return ProductSettings::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
