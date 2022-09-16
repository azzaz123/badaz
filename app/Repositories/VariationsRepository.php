<?php

namespace App\Repositories;

use App\Models\Variations;

class VariationsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'product_id',
        'user_id',
        'parent_id',
        'label_names',
        'variation_type',
        'insert_type',
        'option_display_type',
        'show_images_on_slider',
        'use_different_price',
        'is_visible',
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
        return Variations::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
