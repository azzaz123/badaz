<?php

namespace App\Repositories;

use App\Models\Categories;

class CategoriesRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'slug',
        'parent_id',
        'tree_id',
        'level',
        'parent_tree',
        'title_meta_tag',
        'description',
        'keywords',
        'category_order',
        'featured_order',
        'homepage_order',
        'visibility',
        'is_featured',
        'show_on_main_menu',
        'show_image_on_main_menu',
        'show_products_on_index',
        'show_subcategory_products',
        'storage',
        'image',
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
        return Categories::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
