<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Slider extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'sliders';

    /**
     * @var string[]
     */
    protected $fillable = [
        'lang_id',
        'title',
        'description',
        'link',
        'item_order',
        'button_text',
        'animation_title',
        'animation_description',
        'animation_button',
        'image',
        'image_mobile',
        'text_color',
        'button_color',
        'button_text_color',
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
        'lang_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'link' => 'string',
        'item_order' => 'integer',
        'button_text' => 'string',
        'animation_title' => 'string',
        'animation_description' => 'string',
        'animation_button' => 'string',
        'image' => 'string',
        'image_mobile' => 'string',
        'text_color' => 'string',
        'button_color' => 'string',
        'button_text_color' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
