<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class ProductDetails extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'product_details';

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'lang_id',
        'title',
        'description',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'is_active',
        'created_at',
        'updated_at',
        'added_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'product_id' => 'integer',
        'lang_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'seo_title' => 'string',
        'seo_description' => 'string',
        'seo_keywords' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
