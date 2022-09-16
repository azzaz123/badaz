<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Products extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var string[]
     */
    protected $fillable = [
        'slug',
        'product_type',
        'listing_type',
        'sku',
        'category_id',
        'price',
        'currency',
        'discount_rate',
        'vat_rate',
        'user_id',
        'status',
        'is_promoted',
        'promote_start_date',
        'promote_end_date',
        'promote_plan',
        'promote_day',
        'is_special_offer',
        'special_offer_date',
        'visibility',
        'rating',
        'pageviews',
        'demo_url',
        'external_link',
        'files_included',
        'stock',
        'shipping_class_id',
        'shipping_delivery_time_id',
        'multiple_sale',
        'is_sold',
        'is_deleted',
        'is_draft',
        'is_free_product',
        'is_rejected',
        'reject_reason',
        'created_at',
        'is_active',
        'updated_at',
        'added_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'slug' => 'string',
        'product_type' => 'string',
        'listing_type' => 'string',
        'sku' => 'string',
        'category_id' => 'integer',
        'price' => 'integer',
        'currency' => 'string',
        'discount_rate' => 'integer',
        'vat_rate' => 'double',
        'user_id' => 'integer',
        'status' => 'integer',
        'is_promoted' => 'integer',
        'promote_start_date' => 'datetime',
        'promote_end_date' => 'datetime',
        'promote_plan' => 'string',
        'promote_day' => 'integer',
        'is_special_offer' => 'integer',
        'special_offer_date' => 'datetime',
        'visibility' => 'integer',
        'rating' => 'string',
        'pageviews' => 'integer',
        'demo_url' => 'string',
        'external_link' => 'string',
        'files_included' => 'string',
        'stock' => 'integer',
        'shipping_class_id' => 'integer',
        'shipping_delivery_time_id' => 'integer',
        'multiple_sale' => 'integer',
        'is_sold' => 'integer',
        'is_deleted' => 'integer',
        'is_draft' => 'integer',
        'is_free_product' => 'integer',
        'is_rejected' => 'integer',
        'reject_reason' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
