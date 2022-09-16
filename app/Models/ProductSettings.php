<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class ProductSettings extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'product_settings';

    /**
     * @var string[]
     */
    protected $fillable = [
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
     * @var string[]
     */
    protected $casts = [
        'marketplace_sku' => 'integer',
        'marketplace_variations' => 'integer',
        'marketplace_shipping' => 'integer',
        'marketplace_product_location' => 'integer',
        'classified_price' => 'integer',
        'classified_price_required' => 'integer',
        'classified_product_location' => 'integer',
        'classified_external_link' => 'integer',
        'physical_demo_url' => 'integer',
        'physical_video_preview' => 'integer',
        'physical_audio_preview' => 'integer',
        'digital_demo_url' => 'integer',
        'digital_video_preview' => 'integer',
        'digital_audio_preview' => 'integer',
        'digital_allowed_file_extensions' => 'string',
        'sitemap_frequency' => 'string',
        'sitemap_last_modification' => 'string',
        'sitemap_priority' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
