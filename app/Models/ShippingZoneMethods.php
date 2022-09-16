<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class ShippingZoneMethods extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'shipping_zone_methods';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name_array',
        'zone_id',
        'user_id',
        'method_type',
        'flat_rate_cost_calculation_type',
        'flat_rate_cost',
        'flat_rate_class_costs_array',
        'local_pickup_cost',
        'free_shipping_min_amount',
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
        'zone_id' => 'integer',
        'user_id' => 'integer',
        'method_type' => 'string',
        'flat_rate_cost_calculation_type' => 'string',
        'flat_rate_cost' => 'integer',
        'flat_rate_class_costs_array' => 'string',
        'local_pickup_cost' => 'integer',
        'free_shipping_min_amount' => 'integer',
        'status' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
