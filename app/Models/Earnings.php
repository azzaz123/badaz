<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Earnings extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'earnings';

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_number',
        'order_product_id',
        'user_id',
        'price',
        'commission_rate',
        'shipping_cost',
        'earned_amount',
        'currency',
        'exchange_rate',
        'is_refunded',
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
        'order_number' => 'integer',
        'order_product_id' => 'integer',
        'user_id' => 'integer',
        'price' => 'integer',
        'commission_rate' => 'integer',
        'shipping_cost' => 'integer',
        'earned_amount' => 'integer',
        'currency' => 'string',
        'exchange_rate' => 'double',
        'is_refunded' => 'integer',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
