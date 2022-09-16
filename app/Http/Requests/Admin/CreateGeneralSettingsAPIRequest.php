<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateGeneralSettingsAPIRequest extends FormRequest
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
            'physical_products_system' => ['nullable', 'integer'],
            'digital_products_system' => ['nullable', 'integer'],
            'marketplace_system' => ['nullable', 'integer'],
            'classified_ads_system' => ['nullable', 'integer'],
            'bidding_system' => ['nullable', 'integer'],
            'selling_license_keys_system' => ['nullable', 'integer'],
            'multi_vendor_system' => ['nullable', 'integer'],
            'membership_plans_system' => ['nullable', 'integer'],
            'vat_status' => ['nullable', 'integer'],
            'site_lang' => ['nullable', 'integer'],
            'timezone' => ['nullable', 'string'],
            'application_name' => ['nullable', 'string'],
            'selected_navigation' => ['nullable', 'integer'],
            'menu_limit' => ['nullable', 'integer'],
            'recaptcha_site_key' => ['nullable', 'string'],
            'recaptcha_secret_key' => ['nullable', 'string'],
            'recaptcha_lang' => ['nullable', 'string'],
            'custom_css_codes' => ['nullable'],
            'custom_javascript_codes' => ['nullable'],
            'mail_library' => ['nullable', 'string'],
            'mail_protocol' => ['nullable', 'string'],
            'mail_encryption' => ['nullable', 'string'],
            'mail_host' => ['nullable', 'string'],
            'mail_port' => ['nullable', 'string'],
            'mail_username' => ['nullable', 'string'],
            'mail_password' => ['nullable', 'string'],
            'mail_title' => ['nullable', 'string'],
            'mail_reply_to' => ['nullable', 'string'],
            'email_verification' => ['nullable', 'integer'],
            'facebook_app_id' => ['nullable', 'string'],
            'facebook_app_secret' => ['nullable', 'string'],
            'google_client_id' => ['nullable', 'string'],
            'google_client_secret' => ['nullable', 'string'],
            'vk_app_id' => ['nullable', 'string'],
            'vk_secure_key' => ['nullable', 'string'],
            'google_analytics' => ['nullable'],
            'promoted_products' => ['nullable', 'integer'],
            'multilingual_system' => ['nullable', 'integer'],
            'product_comments' => ['nullable', 'integer'],
            'comment_approval_system' => ['nullable', 'integer'],
            'reviews' => ['nullable', 'integer'],
            'blog_comments' => ['nullable', 'integer'],
            'slider_status' => ['nullable', 'integer'],
            'slider_type' => ['nullable', 'string'],
            'slider_effect' => ['nullable', 'string'],
            'featured_categories' => ['nullable', 'integer'],
            'index_promoted_products' => ['nullable', 'integer'],
            'index_promoted_products_count' => ['nullable', 'integer'],
            'index_latest_products' => ['nullable', 'integer'],
            'index_latest_products_count' => ['nullable', 'integer'],
            'index_blog_slider' => ['nullable', 'integer'],
            'product_link_structure' => ['nullable', 'string'],
            'mds_key' => ['nullable', 'string'],
            'purchase_code' => ['nullable', 'string'],
            'site_color' => ['nullable', 'string'],
            'logo' => ['nullable', 'string'],
            'logo_email' => ['nullable', 'string'],
            'favicon' => ['nullable', 'string'],
            'watermark_image_large' => ['nullable', 'string'],
            'watermark_image_mid' => ['nullable', 'string'],
            'watermark_image_small' => ['nullable', 'string'],
            'watermark_vrt_alignment' => ['nullable', 'string'],
            'watermark_hor_alignment' => ['nullable', 'string'],
            'watermark_product_images' => ['nullable', 'integer'],
            'watermark_blog_images' => ['nullable', 'integer'],
            'watermark_thumbnail_images' => ['nullable', 'integer'],
            'facebook_comment' => ['nullable'],
            'facebook_comment_status' => ['nullable', 'integer'],
            'product_cache_system' => ['nullable', 'integer'],
            'static_content_cache_system' => ['nullable', 'integer'],
            'refresh_cache_database_changes' => ['nullable', 'integer'],
            'cache_refresh_time' => ['nullable', 'integer'],
            'rss_system' => ['nullable', 'integer'],
            'approve_before_publishing' => ['nullable', 'integer'],
            'commission_rate' => ['nullable', 'integer'],
            'send_email_new_product' => ['nullable', 'integer'],
            'send_email_buyer_purchase' => ['nullable', 'integer'],
            'send_email_contact_messages' => ['nullable', 'integer'],
            'send_email_order_shipped' => ['nullable', 'integer'],
            'send_email_shop_opening_request' => ['nullable', 'integer'],
            'send_email_bidding_system' => ['nullable', 'integer'],
            'mail_options_account' => ['nullable', 'string'],
            'vendor_verification_system' => ['nullable', 'integer'],
            'hide_vendor_contact_information' => ['nullable', 'integer'],
            'guest_checkout' => ['nullable', 'integer'],
            'maintenance_mode_title' => ['nullable', 'string'],
            'maintenance_mode_description' => ['nullable', 'string'],
            'maintenance_mode_status' => ['nullable', 'integer'],
            'max_file_size_image' => ['nullable', 'integer'],
            'max_file_size_video' => ['nullable', 'integer'],
            'max_file_size_audio' => ['nullable', 'integer'],
            'google_adsense_code' => ['nullable', 'string'],
            'sort_categories' => ['nullable', 'string'],
            'sort_parent_categories_by_order' => ['nullable', 'integer'],
            'pwa_status' => ['nullable', 'integer'],
            'location_search_header' => ['nullable', 'integer'],
            'vendor_bulk_product_upload' => ['nullable', 'integer'],
            'show_sold_products' => ['nullable', 'integer'],
            'newsletter_status' => ['nullable', 'integer'],
            'newsletter_popup' => ['nullable', 'integer'],
            'request_documents_vendors' => ['nullable', 'integer'],
            'explanation_documents_vendors' => ['nullable', 'string'],
            'last_cron_update' => ['nullable'],
            'last_cron_update_long' => ['nullable'],
            'version' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
