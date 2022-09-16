<?php

namespace App\Repositories;

use App\Models\Products;

class ProductsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'slug',
        'product_type',
        'listing_type',
        'sku',
        'category_id',
        'price',
        'currency',
        'discount_rate',
        'vat_rate',
        'user_id',
        'status',
        'is_promoted',
        'promote_start_date',
        'promote_end_date',
        'promote_plan',
        'promote_day',
        'is_special_offer',
        'special_offer_date',
        'visibility',
        'rating',
        'pageviews',
        'demo_url',
        'external_link',
        'files_included',
        'stock',
        'shipping_class_id',
        'shipping_delivery_time_id',
        'multiple_sale',
        'is_sold',
        'is_deleted',
        'is_draft',
        'is_free_product',
        'is_rejected',
        'reject_reason',
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
        return Products::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
