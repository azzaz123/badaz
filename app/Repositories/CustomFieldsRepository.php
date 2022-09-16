<?php

namespace App\Repositories;

use App\Models\CustomFields;

class CustomFieldsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'name_array',
        'field_type',
        'row_width',
        'is_required',
        'status',
        'field_order',
        'is_product_filter',
        'product_filter_key',
        'sort_options',
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
        return CustomFields::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
