<?php

namespace App\Repositories;

use App\Models\OrderShipping;

class OrderShippingRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'order_id',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_phone_number',
        'shipping_address',
        'shipping_country',
        'shipping_state',
        'shipping_city',
        'shipping_zip_code',
        'billing_first_name',
        'billing_last_name',
        'billing_email',
        'billing_phone_number',
        'billing_address',
        'billing_country',
        'billing_state',
        'billing_city',
        'billing_zip_code',
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
        return OrderShipping::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
