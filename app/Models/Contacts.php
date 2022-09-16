<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Contacts extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'contacts';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
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
        'name' => 'string',
        'email' => 'string',
        'message' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
