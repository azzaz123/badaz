<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class LocationStates extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'location_states';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'country_id',
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
        'name' => 'string',
        'country_id' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
