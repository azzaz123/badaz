<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class MembershipTransactions extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'membership_transactions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'plan_id',
        'plan_title',
        'payment_method',
        'payment_id',
        'payment_amount',
        'currency',
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
        'user_id' => 'integer',
        'plan_id' => 'integer',
        'plan_title' => 'string',
        'payment_method' => 'string',
        'payment_id' => 'string',
        'payment_amount' => 'string',
        'currency' => 'string',
        'payment_status' => 'string',
        'ip_address' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
