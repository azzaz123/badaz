<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateGeneralSettingsAPIRequest extends FormRequest
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
            'data.*.physical_products_system' => ['nullable', 'integer'],
            'data.*.digital_products_system' => ['nullable', 'integer'],
            'data.*.marketplace_system' => ['nullable', 'integer'],
            'data.*.classified_ads_system' => ['nullable', 'integer'],
            'data.*.bidding_system' => ['nullable', 'integer'],
            'data.*.selling_license_keys_system' => ['nullable', 'integer'],
            'data.*.multi_vendor_system' => ['nullable', 'integer'],
            'data.*.membership_plans_system' => ['nullable', 'integer'],
            'data.*.vat_status' => ['nullable', 'integer'],
            'data.*.site_lang' => ['nullable', 'integer'],
            'data.*.timezone' => ['nullable', 'string'],
            'data.*.application_name' => ['nullable', 'string'],
            'data.*.selected_navigation' => ['nullable', 'integer'],
            'data.*.menu_limit' => ['nullable', 'integer'],
            'data.*.recaptcha_site_key' => ['nullable', 'string'],
            'data.*.recaptcha_secret_key' => ['nullable', 'string'],
            'data.*.recaptcha_lang' => ['nullable', 'string'],
            'data.*.custom_css_codes' => ['nullable'],
            'data.*.custom_javascript_codes' => ['nullable'],
            'data.*.mail_library' => ['nullable', 'string'],
            'data.*.mail_protocol' => ['nullable', 'string'],
            'data.*.mail_encryption' => ['nullable', 'string'],
            'data.*.mail_host' => ['nullable', 'string'],
            'data.*.mail_port' => ['nullable', 'string'],
            'data.*.mail_username' => ['nullable', 'string'],
            'data.*.mail_password' => ['nullable', 'string'],
            'data.*.mail_title' => ['nullable', 'string'],
            'data.*.mail_reply_to' => ['nullable', 'string'],
            'data.*.email_verification' => ['nullable', 'integer'],
            'data.*.facebook_app_id' => ['nullable', 'string'],
            'data.*.facebook_app_secret' => ['nullable', 'string'],
            'data.*.google_client_id' => ['nullable', 'string'],
            'data.*.google_client_secret' => ['nullable', 'string'],
            'data.*.vk_app_id' => ['nullable', 'string'],
            'data.*.vk_secure_key' => ['nullable', 'string'],
            'data.*.google_analytics' => ['nullable'],
            'data.*.promoted_products' => ['nullable', 'integer'],
            'data.*.multilingual_system' => ['nullable', 'integer'],
            'data.*.product_comments' => ['nullable', 'integer'],
            'data.*.comment_approval_system' => ['nullable', 'integer'],
            'data.*.reviews' => ['nullable', 'integer'],
            'data.*.blog_comments' => ['nullable', 'integer'],
            'data.*.slider_status' => ['nullable', 'integer'],
            'data.*.slider_type' => ['nullable', 'string'],
            'data.*.slider_effect' => ['nullable', 'string'],
            'data.*.featured_categories' => ['nullable', 'integer'],
            'data.*.index_promoted_products' => ['nullable', 'integer'],
            'data.*.index_promoted_products_count' => ['nullable', 'integer'],
            'data.*.index_latest_products' => ['nullable', 'integer'],
            'data.*.index_latest_products_count' => ['nullable', 'integer'],
            'data.*.index_blog_slider' => ['nullable', 'integer'],
            'data.*.product_link_structure' => ['nullable', 'string'],
            'data.*.mds_key' => ['nullable', 'string'],
            'data.*.purchase_code' => ['nullable', 'string'],
            'data.*.site_color' => ['nullable', 'string'],
            'data.*.logo' => ['nullable', 'string'],
            'data.*.logo_email' => ['nullable', 'string'],
            'data.*.favicon' => ['nullable', 'string'],
            'data.*.watermark_image_large' => ['nullable', 'string'],
            'data.*.watermark_image_mid' => ['nullable', 'string'],
            'data.*.watermark_image_small' => ['nullable', 'string'],
            'data.*.watermark_vrt_alignment' => ['nullable', 'string'],
            'data.*.watermark_hor_alignment' => ['nullable', 'string'],
            'data.*.watermark_product_images' => ['nullable', 'integer'],
            'data.*.watermark_blog_images' => ['nullable', 'integer'],
            'data.*.watermark_thumbnail_images' => ['nullable', 'integer'],
            'data.*.facebook_comment' => ['nullable'],
            'data.*.facebook_comment_status' => ['nullable', 'integer'],
            'data.*.product_cache_system' => ['nullable', 'integer'],
            'data.*.static_content_cache_system' => ['nullable', 'integer'],
            'data.*.refresh_cache_database_changes' => ['nullable', 'integer'],
            'data.*.cache_refresh_time' => ['nullable', 'integer'],
            'data.*.rss_system' => ['nullable', 'integer'],
            'data.*.approve_before_publishing' => ['nullable', 'integer'],
            'data.*.commission_rate' => ['nullable', 'integer'],
            'data.*.send_email_new_product' => ['nullable', 'integer'],
            'data.*.send_email_buyer_purchase' => ['nullable', 'integer'],
            'data.*.send_email_contact_messages' => ['nullable', 'integer'],
            'data.*.send_email_order_shipped' => ['nullable', 'integer'],
            'data.*.send_email_shop_opening_request' => ['nullable', 'integer'],
            'data.*.send_email_bidding_system' => ['nullable', 'integer'],
            'data.*.mail_options_account' => ['nullable', 'string'],
            'data.*.vendor_verification_system' => ['nullable', 'integer'],
            'data.*.hide_vendor_contact_information' => ['nullable', 'integer'],
            'data.*.guest_checkout' => ['nullable', 'integer'],
            'data.*.maintenance_mode_title' => ['nullable', 'string'],
            'data.*.maintenance_mode_description' => ['nullable', 'string'],
            'data.*.maintenance_mode_status' => ['nullable', 'integer'],
            'data.*.max_file_size_image' => ['nullable', 'integer'],
            'data.*.max_file_size_video' => ['nullable', 'integer'],
            'data.*.max_file_size_audio' => ['nullable', 'integer'],
            'data.*.google_adsense_code' => ['nullable', 'string'],
            'data.*.sort_categories' => ['nullable', 'string'],
            'data.*.sort_parent_categories_by_order' => ['nullable', 'integer'],
            'data.*.pwa_status' => ['nullable', 'integer'],
            'data.*.location_search_header' => ['nullable', 'integer'],
            'data.*.vendor_bulk_product_upload' => ['nullable', 'integer'],
            'data.*.show_sold_products' => ['nullable', 'integer'],
            'data.*.newsletter_status' => ['nullable', 'integer'],
            'data.*.newsletter_popup' => ['nullable', 'integer'],
            'data.*.request_documents_vendors' => ['nullable', 'integer'],
            'data.*.explanation_documents_vendors' => ['nullable', 'string'],
            'data.*.last_cron_update' => ['nullable'],
            'data.*.last_cron_update_long' => ['nullable'],
            'data.*.version' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
