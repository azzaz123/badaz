<?php

namespace App\Repositories;

use App\Models\Earnings;

class EarningsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'order_number',
        'order_product_id',
        'user_id',
        'price',
        'commission_rate',
        'shipping_cost',
        'earned_amount',
        'currency',
        'exchange_rate',
        'is_refunded',
        'created_at',
        'is_active',
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
        return Earnings::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
