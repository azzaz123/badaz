<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateUsersAPIRequest extends FormRequest
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
            'data.*.username' => ['nullable', 'string'],
            'data.*.slug' => ['nullable', 'string'],
            'data.*.email' => ['nullable', 'string'],
            'data.*.email_status' => ['nullable', 'integer'],
            'data.*.token' => ['nullable', 'string'],
            'data.*.password' => ['nullable', 'string'],
            'data.*.role_id' => ['nullable', 'integer'],
            'data.*.has_active_shop' => ['nullable', 'integer'],
            'data.*.balance' => ['nullable', 'integer'],
            'data.*.number_of_sales' => ['nullable', 'integer'],
            'data.*.user_type' => ['nullable', 'string'],
            'data.*.facebook_id' => ['nullable', 'string'],
            'data.*.google_id' => ['nullable', 'string'],
            'data.*.vkontakte_id' => ['nullable', 'string'],
            'data.*.avatar' => ['nullable', 'string'],
            'data.*.cover_image' => ['nullable', 'string'],
            'data.*.cover_image_type' => ['nullable', 'string'],
            'data.*.banned' => ['nullable', 'integer'],
            'data.*.first_name' => ['nullable', 'string'],
            'data.*.last_name' => ['nullable', 'string'],
            'data.*.shop_name' => ['nullable', 'string'],
            'data.*.about_me' => ['nullable', 'string'],
            'data.*.phone_number' => ['nullable', 'string'],
            'data.*.country_id' => ['nullable', 'integer'],
            'data.*.state_id' => ['nullable', 'integer'],
            'data.*.city_id' => ['nullable', 'integer'],
            'data.*.address' => ['nullable', 'string'],
            'data.*.zip_code' => ['nullable', 'string'],
            'data.*.show_email' => ['nullable', 'integer'],
            'data.*.show_phone' => ['nullable', 'integer'],
            'data.*.show_location' => ['nullable', 'integer'],
            'data.*.personal_website_url' => ['nullable', 'string'],
            'data.*.facebook_url' => ['nullable', 'string'],
            'data.*.twitter_url' => ['nullable', 'string'],
            'data.*.instagram_url' => ['nullable', 'string'],
            'data.*.pinterest_url' => ['nullable', 'string'],
            'data.*.linkedin_url' => ['nullable', 'string'],
            'data.*.vk_url' => ['nullable', 'string'],
            'data.*.youtube_url' => ['nullable', 'string'],
            'data.*.whatsapp_url' => ['nullable', 'string'],
            'data.*.telegram_url' => ['nullable', 'string'],
            'data.*.last_seen' => ['nullable'],
            'data.*.show_rss_feeds' => ['nullable', 'integer'],
            'data.*.send_email_new_message' => ['nullable', 'integer'],
            'data.*.is_active_shop_request' => ['nullable', 'integer'],
            'data.*.vendor_documents' => ['nullable', 'string'],
            'data.*.is_membership_plan_expired' => ['nullable', 'integer'],
            'data.*.is_used_free_plan' => ['nullable', 'integer'],
            'data.*.cash_on_delivery' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
