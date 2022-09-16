<?php

namespace App\Repositories;

use App\Models\Orders;

class OrdersRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'order_number',
        'buyer_id',
        'buyer_type',
        'price_subtotal',
        'price_vat',
        'price_shipping',
        'price_total',
        'price_currency',
        'coupon_code',
        'coupon_discount',
        'coupon_discount_rate',
        'coupon_seller_id',
        'status',
        'payment_method',
        'payment_status',
        'updated_at',
        'created_at',
        'is_active',
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
        return Orders::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
