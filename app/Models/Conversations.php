<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Conversations extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'conversations';

    /**
     * @var string[]
     */
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'subject',
        'product_id',
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
        'sender_id' => 'integer',
        'receiver_id' => 'integer',
        'subject' => 'string',
        'product_id' => 'integer',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
