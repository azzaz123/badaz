<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoriesAPIRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'slug' => ['nullable', 'string'],
            'parent_id' => ['nullable', 'integer'],
            'tree_id' => ['nullable', 'integer'],
            'level' => ['nullable', 'integer'],
            'parent_tree' => ['nullable', 'string'],
            'title_meta_tag' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string'],
            'category_order' => ['nullable', 'integer'],
            'featured_order' => ['nullable', 'integer'],
            'homepage_order' => ['nullable', 'integer'],
            'visibility' => ['nullable', 'integer'],
            'is_featured' => ['nullable', 'integer'],
            'show_on_main_menu' => ['nullable', 'integer'],
            'show_image_on_main_menu' => ['nullable', 'integer'],
            'show_products_on_index' => ['nullable', 'integer'],
            'show_subcategory_products' => ['nullable', 'integer'],
            'storage' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
