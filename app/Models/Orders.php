<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Orders extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_number',
        'buyer_id',
        'buyer_type',
        'price_subtotal',
        'price_vat',
        'price_shipping',
        'price_total',
        'price_currency',
        'coupon_code',
        'coupon_discount',
        'coupon_discount_rate',
        'coupon_seller_id',
        'status',
        'payment_method',
        'payment_status',
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
        'order_number' => 'integer',
        'buyer_id' => 'integer',
        'buyer_type' => 'string',
        'price_subtotal' => 'string',
        'price_vat' => 'integer',
        'price_shipping' => 'string',
        'price_total' => 'string',
        'price_currency' => 'string',
        'coupon_code' => 'string',
        'coupon_discount' => 'integer',
        'coupon_discount_rate' => 'integer',
        'coupon_seller_id' => 'integer',
        'status' => 'integer',
        'payment_method' => 'string',
        'payment_status' => 'string',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
