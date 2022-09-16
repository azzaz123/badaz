<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class SupportSubtickets extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'support_subtickets';

    /**
     * @var string[]
     */
    protected $fillable = [
        'ticket_id',
        'user_id',
        'message',
        'attachments',
        'is_support_reply',
        'storage',
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
        'ticket_id' => 'integer',
        'user_id' => 'integer',
        'message' => 'string',
        'attachments' => 'string',
        'is_support_reply' => 'integer',
        'storage' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
