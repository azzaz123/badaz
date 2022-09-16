<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Settings extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var string[]
     */
    protected $fillable = [
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
     * @var string[]
     */
    protected $casts = [
        'lang_id' => 'integer',
        'site_font' => 'integer',
        'dashboard_font' => 'integer',
        'site_title' => 'string',
        'homepage_title' => 'string',
        'site_description' => 'string',
        'keywords' => 'string',
        'facebook_url' => 'string',
        'twitter_url' => 'string',
        'instagram_url' => 'string',
        'pinterest_url' => 'string',
        'linkedin_url' => 'string',
        'vk_url' => 'string',
        'whatsapp_url' => 'string',
        'telegram_url' => 'string',
        'youtube_url' => 'string',
        'about_footer' => 'string',
        'contact_text' => 'string',
        'contact_address' => 'string',
        'contact_email' => 'string',
        'contact_phone' => 'string',
        'copyright' => 'string',
        'cookies_warning' => 'integer',
        'cookies_warning_text' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
