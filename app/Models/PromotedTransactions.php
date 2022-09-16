<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class PromotedTransactions extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'promoted_transactions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'payment_method',
        'payment_id',
        'user_id',
        'product_id',
        'currency',
        'payment_amount',
        'payment_status',
        'purchased_plan',
        'day_count',
        'ip_address',
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
        'payment_method' => 'string',
        'payment_id' => 'string',
        'user_id' => 'integer',
        'product_id' => 'integer',
        'currency' => 'string',
        'payment_amount' => 'string',
        'payment_status' => 'string',
        'purchased_plan' => 'string',
        'day_count' => 'integer',
        'ip_address' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
