<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class ShippingClasses extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'shipping_classes';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name_array',
        'user_id',
        'status',
        'is_active',
        'created_at',
        'updated_at',
        'added_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'name_array' => 'string',
        'user_id' => 'integer',
        'status' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
