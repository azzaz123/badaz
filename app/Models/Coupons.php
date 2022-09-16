<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Coupons extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'coupons';

    /**
     * @var string[]
     */
    protected $fillable = [
        'seller_id',
        'coupon_code',
        'discount_rate',
        'coupon_count',
        'minimum_order_amount',
        'currency',
        'usage_type',
        'category_ids',
        'expiry_date',
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
        'seller_id' => 'integer',
        'coupon_code' => 'string',
        'discount_rate' => 'integer',
        'coupon_count' => 'integer',
        'minimum_order_amount' => 'integer',
        'currency' => 'string',
        'usage_type' => 'string',
        'category_ids' => 'string',
        'expiry_date' => 'datetime',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
