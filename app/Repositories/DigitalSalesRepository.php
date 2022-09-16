<?php

namespace App\Repositories;

use App\Models\DigitalSales;

class DigitalSalesRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'order_id',
        'product_id',
        'product_title',
        'seller_id',
        'buyer_id',
        'license_key',
        'purchase_code',
        'currency',
        'price',
        'purchase_date',
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
        return DigitalSales::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
