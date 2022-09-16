<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class SupportTickets extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'support_tickets';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'subject',
        'is_guest',
        'status',
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
        'user_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'subject' => 'string',
        'is_guest' => 'integer',
        'status' => 'integer',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
