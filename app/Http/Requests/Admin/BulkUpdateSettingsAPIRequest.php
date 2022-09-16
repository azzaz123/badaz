<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateSettingsAPIRequest extends FormRequest
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
            'data.*.lang_id' => ['nullable', 'integer'],
            'data.*.site_font' => ['nullable', 'integer'],
            'data.*.dashboard_font' => ['nullable', 'integer'],
            'data.*.site_title' => ['nullable', 'string'],
            'data.*.homepage_title' => ['nullable', 'string'],
            'data.*.site_description' => ['nullable', 'string'],
            'data.*.keywords' => ['nullable', 'string'],
            'data.*.facebook_url' => ['nullable', 'string'],
            'data.*.twitter_url' => ['nullable', 'string'],
            'data.*.instagram_url' => ['nullable', 'string'],
            'data.*.pinterest_url' => ['nullable', 'string'],
            'data.*.linkedin_url' => ['nullable', 'string'],
            'data.*.vk_url' => ['nullable', 'string'],
            'data.*.whatsapp_url' => ['nullable', 'string'],
            'data.*.telegram_url' => ['nullable', 'string'],
            'data.*.youtube_url' => ['nullable', 'string'],
            'data.*.about_footer' => ['nullable', 'string'],
            'data.*.contact_text' => ['nullable'],
            'data.*.contact_address' => ['nullable', 'string'],
            'data.*.contact_email' => ['nullable', 'string'],
            'data.*.contact_phone' => ['nullable', 'string'],
            'data.*.copyright' => ['nullable', 'string'],
            'data.*.cookies_warning' => ['nullable', 'integer'],
            'data.*.cookies_warning_text' => ['nullable'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
