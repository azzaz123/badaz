<?php

namespace App\Repositories;

use App\Models\ShippingAddresses;

class ShippingAddressesRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'user_id',
        'title',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'country_id',
        'state_id',
        'city',
        'zip_code',
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
        return ShippingAddresses::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
