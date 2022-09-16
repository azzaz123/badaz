<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class RefundRequestsMessages extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'refund_requests_messages';

    /**
     * @var string[]
     */
    protected $fillable = [
        'request_id',
        'user_id',
        'is_buyer',
        'message',
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
        'request_id' => 'integer',
        'user_id' => 'integer',
        'is_buyer' => 'integer',
        'message' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
