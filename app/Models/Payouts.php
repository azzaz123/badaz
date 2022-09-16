<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Payouts extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'payouts';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'payout_method',
        'amount',
        'currency',
        'status',
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
        'payout_method' => 'string',
        'amount' => 'integer',
        'currency' => 'string',
        'status' => 'integer',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
