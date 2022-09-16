<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class UsersResource extends BaseAPIResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $fieldsFilter = $request->get('fields');
        if (!empty($fieldsFilter) || $request->get('include')) {
            return $this->resource->toArray();
        }

        return [
            'id' => $this->id,
            'username' => $this->username,
            'slug' => $this->slug,
            'email' => $this->email,
            'email_status' => $this->email_status,
            'token' => $this->token,
            'password' => $this->password,
            'role_id' => $this->role_id,
            'has_active_shop' => $this->has_active_shop,
            'balance' => $this->balance,
            'number_of_sales' => $this->number_of_sales,
            'user_type' => $this->user_type,
            'facebook_id' => $this->facebook_id,
            'google_id' => $this->google_id,
            'vkontakte_id' => $this->vkontakte_id,
            'avatar' => $this->avatar,
            'cover_image' => $this->cover_image,
            'cover_image_type' => $this->cover_image_type,
            'banned' => $this->banned,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'shop_name' => $this->shop_name,
            'about_me' => $this->about_me,
            'phone_number' => $this->phone_number,
            'country_id' => $this->country_id,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            'address' => $this->address,
            'zip_code' => $this->zip_code,
            'show_email' => $this->show_email,
            'show_phone' => $this->show_phone,
            'show_location' => $this->show_location,
            'personal_website_url' => $this->personal_website_url,
            'facebook_url' => $this->facebook_url,
            'twitter_url' => $this->twitter_url,
            'instagram_url' => $this->instagram_url,
            'pinterest_url' => $this->pinterest_url,
            'linkedin_url' => $this->linkedin_url,
            'vk_url' => $this->vk_url,
            'youtube_url' => $this->youtube_url,
            'whatsapp_url' => $this->whatsapp_url,
            'telegram_url' => $this->telegram_url,
            'last_seen' => $this->last_seen,
            'show_rss_feeds' => $this->show_rss_feeds,
            'send_email_new_message' => $this->send_email_new_message,
            'is_active_shop_request' => $this->is_active_shop_request,
            'vendor_documents' => $this->vendor_documents,
            'is_membership_plan_expired' => $this->is_membership_plan_expired,
            'is_used_free_plan' => $this->is_used_free_plan,
            'cash_on_delivery' => $this->cash_on_delivery,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
