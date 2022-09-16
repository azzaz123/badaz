<?php

namespace App\Repositories;

use App\Models\Coupons;

class CouponsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'seller_id',
        'coupon_code',
        'discount_rate',
        'coupon_count',
        'minimum_order_amount',
        'currency',
        'usage_type',
        'category_ids',
        'expiry_date',
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
        return Coupons::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
