<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class QuoteRequests extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'quote_requests';

    /**
     * @var string[]
     */
    protected $fillable = [
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
     * @var string[]
     */
    protected $casts = [
        'product_id' => 'integer',
        'product_title' => 'string',
        'product_quantity' => 'integer',
        'seller_id' => 'integer',
        'buyer_id' => 'integer',
        'status' => 'string',
        'price_offered' => 'integer',
        'price_currency' => 'string',
        'is_buyer_deleted' => 'integer',
        'is_seller_deleted' => 'integer',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
