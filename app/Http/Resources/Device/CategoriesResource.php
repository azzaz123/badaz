<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class CategoriesResource extends BaseAPIResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $fieldsFilter = $request->get('fields');
        if (!empty($fieldsFilter) || $request->get('include')) {
            return $this->resource->toArray();
        }

        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'parent_id' => $this->parent_id,
            'tree_id' => $this->tree_id,
            'level' => $this->level,
            'parent_tree' => $this->parent_tree,
            'title_meta_tag' => $this->title_meta_tag,
            'description' => $this->description,
            'keywords' => $this->keywords,
            'category_order' => $this->category_order,
            'featured_order' => $this->featured_order,
            'homepage_order' => $this->homepage_order,
            'visibility' => $this->visibility,
            'is_featured' => $this->is_featured,
            'show_on_main_menu' => $this->show_on_main_menu,
            'show_image_on_main_menu' => $this->show_image_on_main_menu,
            'show_products_on_index' => $this->show_products_on_index,
            'show_subcategory_products' => $this->show_subcategory_products,
            'storage' => $this->storage,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
