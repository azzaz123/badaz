<?php

namespace App\Repositories;

use App\Models\PromotedTransactions;

class PromotedTransactionsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'payment_method',
        'payment_id',
        'user_id',
        'product_id',
        'currency',
        'payment_amount',
        'payment_status',
        'purchased_plan',
        'day_count',
        'ip_address',
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
        return PromotedTransactions::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
