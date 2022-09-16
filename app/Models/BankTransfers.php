<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class BankTransfers extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'bank_transfers';

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_number',
        'payment_note',
        'receipt_path',
        'user_id',
        'user_type',
        'status',
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
        'order_number' => 'integer',
        'payment_note' => 'string',
        'receipt_path' => 'string',
        'user_id' => 'integer',
        'user_type' => 'string',
        'status' => 'string',
        'ip_address' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
