<?php

namespace App\Repositories;

use App\Models\GeneralSettings;

class GeneralSettingsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'physical_products_system',
        'digital_products_system',
        'marketplace_system',
        'classified_ads_system',
        'bidding_system',
        'selling_license_keys_system',
        'multi_vendor_system',
        'membership_plans_system',
        'vat_status',
        'site_lang',
        'timezone',
        'application_name',
        'selected_navigation',
        'menu_limit',
        'recaptcha_site_key',
        'recaptcha_secret_key',
        'recaptcha_lang',
        'custom_css_codes',
        'custom_javascript_codes',
        'mail_library',
        'mail_protocol',
        'mail_encryption',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_title',
        'mail_reply_to',
        'email_verification',
        'facebook_app_id',
        'facebook_app_secret',
        'google_client_id',
        'google_client_secret',
        'vk_app_id',
        'vk_secure_key',
        'google_analytics',
        'promoted_products',
        'multilingual_system',
        'product_comments',
        'comment_approval_system',
        'reviews',
        'blog_comments',
        'slider_status',
        'slider_type',
        'slider_effect',
        'featured_categories',
        'index_promoted_products',
        'index_promoted_products_count',
        'index_latest_products',
        'index_latest_products_count',
        'index_blog_slider',
        'product_link_structure',
        'mds_key',
        'purchase_code',
        'site_color',
        'logo',
        'logo_email',
        'favicon',
        'watermark_image_large',
        'watermark_image_mid',
        'watermark_image_small',
        'watermark_vrt_alignment',
        'watermark_hor_alignment',
        'watermark_product_images',
        'watermark_blog_images',
        'watermark_thumbnail_images',
        'facebook_comment',
        'facebook_comment_status',
        'product_cache_system',
        'static_content_cache_system',
        'refresh_cache_database_changes',
        'cache_refresh_time',
        'rss_system',
        'approve_before_publishing',
        'commission_rate',
        'send_email_new_product',
        'send_email_buyer_purchase',
        'send_email_contact_messages',
        'send_email_order_shipped',
        'send_email_shop_opening_request',
        'send_email_bidding_system',
        'mail_options_account',
        'vendor_verification_system',
        'hide_vendor_contact_information',
        'guest_checkout',
        'maintenance_mode_title',
        'maintenance_mode_description',
        'maintenance_mode_status',
        'max_file_size_image',
        'max_file_size_video',
        'max_file_size_audio',
        'google_adsense_code',
        'sort_categories',
        'sort_parent_categories_by_order',
        'pwa_status',
        'location_search_header',
        'vendor_bulk_product_upload',
        'show_sold_products',
        'newsletter_status',
        'newsletter_popup',
        'request_documents_vendors',
        'explanation_documents_vendors',
        'last_cron_update',
        'last_cron_update_long',
        'version',
        'is_active',
        'created_at',
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
        return GeneralSettings::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
