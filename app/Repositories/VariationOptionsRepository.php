<?php

namespace App\Repositories;

use App\Models\VariationOptions;

class VariationOptionsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'variation_id',
        'parent_id',
        'option_names',
        'stock',
        'color',
        'price',
        'discount_rate',
        'is_default',
        'use_default_price',
        'no_discount',
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
        return VariationOptions::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
