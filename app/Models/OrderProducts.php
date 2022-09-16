<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class OrderProducts extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'order_products';

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_id',
        'seller_id',
        'buyer_id',
        'buyer_type',
        'product_id',
        'product_type',
        'listing_type',
        'product_title',
        'product_slug',
        'product_unit_price',
        'product_quantity',
        'product_currency',
        'product_vat_rate',
        'product_vat',
        'product_total_price',
        'variation_option_ids',
        'commission_rate',
        'order_status',
        'is_approved',
        'shipping_tracking_number',
        'shipping_tracking_url',
        'shipping_method',
        'seller_shipping_cost',
        'updated_at',
        'created_at',
        'is_active',
        'added_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'order_id' => 'integer',
        'seller_id' => 'integer',
        'buyer_id' => 'integer',
        'buyer_type' => 'string',
        'product_id' => 'integer',
        'product_type' => 'string',
        'listing_type' => 'string',
        'product_title' => 'string',
        'product_slug' => 'string',
        'product_unit_price' => 'integer',
        'product_quantity' => 'integer',
        'product_currency' => 'string',
        'product_vat_rate' => 'double',
        'product_vat' => 'integer',
        'product_total_price' => 'integer',
        'variation_option_ids' => 'string',
        'commission_rate' => 'integer',
        'order_status' => 'string',
        'is_approved' => 'integer',
        'shipping_tracking_number' => 'string',
        'shipping_tracking_url' => 'string',
        'shipping_method' => 'string',
        'seller_shipping_cost' => 'integer',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
