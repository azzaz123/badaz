<?php

namespace App\Repositories;

use App\Models\BlogPosts;

class BlogPostsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'lang_id',
        'title',
        'slug',
        'summary',
        'content',
        'keywords',
        'category_id',
        'storage',
        'image_default',
        'image_small',
        'user_id',
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
        return BlogPosts::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
