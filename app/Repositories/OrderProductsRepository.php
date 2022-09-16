<?php

namespace App\Repositories;

use App\Models\OrderProducts;

class OrderProductsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'order_id',
        'seller_id',
        'buyer_id',
        'buyer_type',
        'product_id',
        'product_type',
        'listing_type',
        'product_title',
        'product_slug',
        'product_unit_price',
        'product_quantity',
        'product_currency',
        'product_vat_rate',
        'product_vat',
        'product_total_price',
        'variation_option_ids',
        'commission_rate',
        'order_status',
        'is_approved',
        'shipping_tracking_number',
        'shipping_tracking_url',
        'shipping_method',
        'seller_shipping_cost',
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
        return OrderProducts::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
