<?php

namespace App\Repositories;

use App\Models\QuoteRequests;

class QuoteRequestsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'product_id',
        'product_title',
        'product_quantity',
        'seller_id',
        'buyer_id',
        'status',
        'price_offered',
        'price_currency',
        'is_buyer_deleted',
        'is_seller_deleted',
        'updated_at',
        'created_at',
        'is_active',
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
        return QuoteRequests::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
