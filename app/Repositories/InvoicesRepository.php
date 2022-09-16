<?php

namespace App\Repositories;

use App\Models\Invoices;

class InvoicesRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'order_id',
        'order_number',
        'client_username',
        'client_first_name',
        'client_last_name',
        'client_email',
        'client_phone_number',
        'client_address',
        'client_country',
        'client_state',
        'client_city',
        'invoice_items',
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
        return Invoices::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
