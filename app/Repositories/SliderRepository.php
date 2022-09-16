<?php

namespace App\Repositories;

use App\Models\Slider;

class SliderRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
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
        return Slider::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
