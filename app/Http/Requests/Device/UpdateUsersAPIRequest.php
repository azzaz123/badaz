<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersAPIRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => ['nullable', 'string'],
            'slug' => ['nullable', 'string'],
            'email' => ['nullable', 'string'],
            'email_status' => ['nullable', 'integer'],
            'token' => ['nullable', 'string'],
            'password' => ['nullable', 'string'],
            'role_id' => ['nullable', 'integer'],
            'has_active_shop' => ['nullable', 'integer'],
            'balance' => ['nullable', 'integer'],
            'number_of_sales' => ['nullable', 'integer'],
            'user_type' => ['nullable', 'string'],
            'facebook_id' => ['nullable', 'string'],
            'google_id' => ['nullable', 'string'],
            'vkontakte_id' => ['nullable', 'string'],
            'avatar' => ['nullable', 'string'],
            'cover_image' => ['nullable', 'string'],
            'cover_image_type' => ['nullable', 'string'],
            'banned' => ['nullable', 'integer'],
            'first_name' => ['nullable', 'string'],
            'last_name' => ['nullable', 'string'],
            'shop_name' => ['nullable', 'string'],
            'about_me' => ['nullable', 'string'],
            'phone_number' => ['nullable', 'string'],
            'country_id' => ['nullable', 'integer'],
            'state_id' => ['nullable', 'integer'],
            'city_id' => ['nullable', 'integer'],
            'address' => ['nullable', 'string'],
            'zip_code' => ['nullable', 'string'],
            'show_email' => ['nullable', 'integer'],
            'show_phone' => ['nullable', 'integer'],
            'show_location' => ['nullable', 'integer'],
            'personal_website_url' => ['nullable', 'string'],
            'facebook_url' => ['nullable', 'string'],
            'twitter_url' => ['nullable', 'string'],
            'instagram_url' => ['nullable', 'string'],
            'pinterest_url' => ['nullable', 'string'],
            'linkedin_url' => ['nullable', 'string'],
            'vk_url' => ['nullable', 'string'],
            'youtube_url' => ['nullable', 'string'],
            'whatsapp_url' => ['nullable', 'string'],
            'telegram_url' => ['nullable', 'string'],
            'last_seen' => ['nullable'],
            'show_rss_feeds' => ['nullable', 'integer'],
            'send_email_new_message' => ['nullable', 'integer'],
            'is_active_shop_request' => ['nullable', 'integer'],
            'vendor_documents' => ['nullable', 'string'],
            'is_membership_plan_expired' => ['nullable', 'integer'],
            'is_used_free_plan' => ['nullable', 'integer'],
            'cash_on_delivery' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
