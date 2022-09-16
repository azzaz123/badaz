<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Reviews extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'reviews';

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'review',
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
        'product_id' => 'integer',
        'user_id' => 'integer',
        'rating' => 'integer',
        'review' => 'string',
        'ip_address' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
