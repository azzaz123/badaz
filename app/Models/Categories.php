<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Categories extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * @var string[]
     */
    protected $fillable = [
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
     * @var string[]
     */
    protected $casts = [
        'slug' => 'string',
        'parent_id' => 'integer',
        'tree_id' => 'integer',
        'level' => 'integer',
        'parent_tree' => 'string',
        'title_meta_tag' => 'string',
        'description' => 'string',
        'keywords' => 'string',
        'category_order' => 'integer',
        'featured_order' => 'integer',
        'homepage_order' => 'integer',
        'visibility' => 'integer',
        'is_featured' => 'integer',
        'show_on_main_menu' => 'integer',
        'show_image_on_main_menu' => 'integer',
        'show_products_on_index' => 'integer',
        'show_subcategory_products' => 'integer',
        'storage' => 'string',
        'image' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
