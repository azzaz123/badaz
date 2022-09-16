<?php

namespace App\Repositories;

use App\Models\UsersMembershipPlans;

class UsersMembershipPlansRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'user_id',
        'plan_id',
        'plan_title',
        'number_of_ads',
        'number_of_days',
        'price',
        'currency',
        'is_free',
        'is_unlimited_number_of_ads',
        'is_unlimited_time',
        'payment_method',
        'payment_status',
        'plan_status',
        'plan_start_date',
        'plan_end_date',
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
        return UsersMembershipPlans::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
