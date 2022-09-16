<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Subscribers extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'subscribers';

    /**
     * @var string[]
     */
    protected $fillable = [
        'email',
        'token',
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
        'email' => 'string',
        'token' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
