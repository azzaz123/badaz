<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class HomepageBanners extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'homepage_banners';

    /**
     * @var string[]
     */
    protected $fillable = [
        'banner_url',
        'banner_image_path',
        'banner_order',
        'banner_width',
        'banner_location',
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
        'banner_url' => 'string',
        'banner_image_path' => 'string',
        'banner_order' => 'integer',
        'banner_width' => 'double',
        'banner_location' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
