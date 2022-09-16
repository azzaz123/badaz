<?php

namespace App\Repositories;

use App\Models\Users;

class UsersRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'username',
        'slug',
        'email',
        'email_status',
        'token',
        'role_id',
        'has_active_shop',
        'balance',
        'number_of_sales',
        'user_type',
        'facebook_id',
        'google_id',
        'vkontakte_id',
        'avatar',
        'cover_image',
        'cover_image_type',
        'banned',
        'first_name',
        'last_name',
        'shop_name',
        'about_me',
        'phone_number',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'zip_code',
        'show_email',
        'show_phone',
        'show_location',
        'personal_website_url',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'pinterest_url',
        'linkedin_url',
        'vk_url',
        'youtube_url',
        'whatsapp_url',
        'telegram_url',
        'last_seen',
        'show_rss_feeds',
        'send_email_new_message',
        'is_active_shop_request',
        'vendor_documents',
        'is_membership_plan_expired',
        'is_used_free_plan',
        'cash_on_delivery',
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
        return Users::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
