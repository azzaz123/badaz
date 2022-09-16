<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Users extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var string[]
     */
    protected $fillable = [
        'username',
        'slug',
        'email',
        'email_status',
        'token',
        'password',
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
     * @var string[]
     */
    protected $casts = [
        'username' => 'string',
        'slug' => 'string',
        'email' => 'string',
        'email_status' => 'integer',
        'token' => 'string',
        'password' => 'string',
        'role_id' => 'integer',
        'has_active_shop' => 'integer',
        'balance' => 'integer',
        'number_of_sales' => 'integer',
        'user_type' => 'string',
        'facebook_id' => 'string',
        'google_id' => 'string',
        'vkontakte_id' => 'string',
        'avatar' => 'string',
        'cover_image' => 'string',
        'cover_image_type' => 'string',
        'banned' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'shop_name' => 'string',
        'about_me' => 'string',
        'phone_number' => 'string',
        'country_id' => 'integer',
        'state_id' => 'integer',
        'city_id' => 'integer',
        'address' => 'string',
        'zip_code' => 'string',
        'show_email' => 'integer',
        'show_phone' => 'integer',
        'show_location' => 'integer',
        'personal_website_url' => 'string',
        'facebook_url' => 'string',
        'twitter_url' => 'string',
        'instagram_url' => 'string',
        'pinterest_url' => 'string',
        'linkedin_url' => 'string',
        'vk_url' => 'string',
        'youtube_url' => 'string',
        'whatsapp_url' => 'string',
        'telegram_url' => 'string',
        'last_seen' => 'datetime',
        'show_rss_feeds' => 'integer',
        'send_email_new_message' => 'integer',
        'is_active_shop_request' => 'integer',
        'vendor_documents' => 'string',
        'is_membership_plan_expired' => 'integer',
        'is_used_free_plan' => 'integer',
        'cash_on_delivery' => 'integer',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
