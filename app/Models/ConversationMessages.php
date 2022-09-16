<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class ConversationMessages extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'conversation_messages';

    /**
     * @var string[]
     */
    protected $fillable = [
        'conversation_id',
        'sender_id',
        'receiver_id',
        'message',
        'is_read',
        'deleted_user_id',
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
        'conversation_id' => 'integer',
        'sender_id' => 'integer',
        'receiver_id' => 'integer',
        'message' => 'string',
        'is_read' => 'integer',
        'deleted_user_id' => 'integer',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
