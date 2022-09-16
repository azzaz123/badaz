<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class ShippingZoneLocations extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'shipping_zone_locations';

    /**
     * @var string[]
     */
    protected $fillable = [
        'zone_id',
        'user_id',
        'continent_code',
        'country_id',
        'state_id',
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
        'zone_id' => 'integer',
        'user_id' => 'integer',
        'continent_code' => 'string',
        'country_id' => 'integer',
        'state_id' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
