<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class RefundRequests extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'refund_requests';

    /**
     * @var string[]
     */
    protected $fillable = [
        'buyer_id',
        'seller_id',
        'order_id',
        'order_number',
        'order_product_id',
        'status',
        'is_completed',
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
        'buyer_id' => 'integer',
        'seller_id' => 'integer',
        'order_id' => 'integer',
        'order_number' => 'integer',
        'order_product_id' => 'integer',
        'status' => 'integer',
        'is_completed' => 'integer',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
