<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class SettingsResource extends BaseAPIResource
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
            'lang_id' => $this->lang_id,
            'site_font' => $this->site_font,
            'dashboard_font' => $this->dashboard_font,
            'site_title' => $this->site_title,
            'homepage_title' => $this->homepage_title,
            'site_description' => $this->site_description,
            'keywords' => $this->keywords,
            'facebook_url' => $this->facebook_url,
            'twitter_url' => $this->twitter_url,
            'instagram_url' => $this->instagram_url,
            'pinterest_url' => $this->pinterest_url,
            'linkedin_url' => $this->linkedin_url,
            'vk_url' => $this->vk_url,
            'whatsapp_url' => $this->whatsapp_url,
            'telegram_url' => $this->telegram_url,
            'youtube_url' => $this->youtube_url,
            'about_footer' => $this->about_footer,
            'contact_text' => $this->contact_text,
            'contact_address' => $this->contact_address,
            'contact_email' => $this->contact_email,
            'contact_phone' => $this->contact_phone,
            'copyright' => $this->copyright,
            'cookies_warning' => $this->cookies_warning,
            'cookies_warning_text' => $this->cookies_warning_text,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
