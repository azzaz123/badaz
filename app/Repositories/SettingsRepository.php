<?php

namespace App\Repositories;

use App\Models\Settings;

class SettingsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'lang_id',
        'site_font',
        'dashboard_font',
        'site_title',
        'homepage_title',
        'site_description',
        'keywords',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'pinterest_url',
        'linkedin_url',
        'vk_url',
        'whatsapp_url',
        'telegram_url',
        'youtube_url',
        'about_footer',
        'contact_text',
        'contact_address',
        'contact_email',
        'contact_phone',
        'copyright',
        'cookies_warning',
        'cookies_warning_text',
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
        return Settings::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
