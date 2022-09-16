<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class CouponsUsed extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'coupons_useds';

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_id',
        'user_id',
        'coupon_code',
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
        'order_id' => 'integer',
        'user_id' => 'integer',
        'coupon_code' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
