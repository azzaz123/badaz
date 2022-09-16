<?php

namespace App\Repositories;

use App\Models\MembershipPlans;

class MembershipPlansRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'title_array',
        'number_of_ads',
        'number_of_days',
        'price',
        'is_free',
        'is_unlimited_number_of_ads',
        'is_unlimited_time',
        'features_array',
        'plan_order',
        'is_popular',
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
        return MembershipPlans::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
