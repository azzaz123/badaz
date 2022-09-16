<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateSettingsAPIRequest extends FormRequest
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
            'lang_id' => ['nullable', 'integer'],
            'site_font' => ['nullable', 'integer'],
            'dashboard_font' => ['nullable', 'integer'],
            'site_title' => ['nullable', 'string'],
            'homepage_title' => ['nullable', 'string'],
            'site_description' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string'],
            'facebook_url' => ['nullable', 'string'],
            'twitter_url' => ['nullable', 'string'],
            'instagram_url' => ['nullable', 'string'],
            'pinterest_url' => ['nullable', 'string'],
            'linkedin_url' => ['nullable', 'string'],
            'vk_url' => ['nullable', 'string'],
            'whatsapp_url' => ['nullable', 'string'],
            'telegram_url' => ['nullable', 'string'],
            'youtube_url' => ['nullable', 'string'],
            'about_footer' => ['nullable', 'string'],
            'contact_text' => ['nullable'],
            'contact_address' => ['nullable', 'string'],
            'contact_email' => ['nullable', 'string'],
            'contact_phone' => ['nullable', 'string'],
            'copyright' => ['nullable', 'string'],
            'cookies_warning' => ['nullable', 'integer'],
            'cookies_warning_text' => ['nullable'],
            'is_active' => ['boolean'],
        ];
    }
}
