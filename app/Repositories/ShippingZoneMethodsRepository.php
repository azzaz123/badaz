<?php

namespace App\Repositories;

use App\Models\ShippingZoneMethods;

class ShippingZoneMethodsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
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
     * @return string[]
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return ShippingZoneMethods::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
