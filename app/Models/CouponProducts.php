<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class CouponProducts extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'coupon_products';

    /**
     * @var string[]
     */
    protected $fillable = [
        'coupon_id',
        'product_id',
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
        'coupon_id' => 'integer',
        'product_id' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
