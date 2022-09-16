<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Transactions extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'transactions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'payment_method',
        'payment_id',
        'order_id',
        'user_id',
        'user_type',
        'currency',
        'payment_amount',
        'payment_status',
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
        'order_id' => 'integer',
        'user_id' => 'integer',
        'user_type' => 'string',
        'currency' => 'string',
        'payment_amount' => 'string',
        'payment_status' => 'string',
        'ip_address' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
