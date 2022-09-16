<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class LocationCountries extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'location_countries';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'continent_code',
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
        'name' => 'string',
        'continent_code' => 'string',
        'status' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
