<?php

namespace App\Repositories;

use App\Models\MembershipTransactions;

class MembershipTransactionsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'user_id',
        'plan_id',
        'plan_title',
        'payment_method',
        'payment_id',
        'payment_amount',
        'currency',
        'payment_status',
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
        return MembershipTransactions::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
