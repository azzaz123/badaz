<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateCategoriesAPIRequest extends FormRequest
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
            'data.*.slug' => ['nullable', 'string'],
            'data.*.parent_id' => ['nullable', 'integer'],
            'data.*.tree_id' => ['nullable', 'integer'],
            'data.*.level' => ['nullable', 'integer'],
            'data.*.parent_tree' => ['nullable', 'string'],
            'data.*.title_meta_tag' => ['nullable', 'string'],
            'data.*.description' => ['nullable', 'string'],
            'data.*.keywords' => ['nullable', 'string'],
            'data.*.category_order' => ['nullable', 'integer'],
            'data.*.featured_order' => ['nullable', 'integer'],
            'data.*.homepage_order' => ['nullable', 'integer'],
            'data.*.visibility' => ['nullable', 'integer'],
            'data.*.is_featured' => ['nullable', 'integer'],
            'data.*.show_on_main_menu' => ['nullable', 'integer'],
            'data.*.show_image_on_main_menu' => ['nullable', 'integer'],
            'data.*.show_products_on_index' => ['nullable', 'integer'],
            'data.*.show_subcategory_products' => ['nullable', 'integer'],
            'data.*.storage' => ['nullable', 'string'],
            'data.*.image' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
