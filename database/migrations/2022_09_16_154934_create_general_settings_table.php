<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('physical_products_system')->nullable();
            $table->integer('digital_products_system')->nullable();
            $table->integer('marketplace_system')->nullable();
            $table->integer('classified_ads_system')->nullable();
            $table->integer('bidding_system')->nullable();
            $table->integer('selling_license_keys_system')->nullable();
            $table->integer('multi_vendor_system')->nullable();
            $table->integer('membership_plans_system')->nullable();
            $table->integer('vat_status')->nullable();
            $table->integer('site_lang')->nullable();
            $table->string('timezone')->nullable();
            $table->string('application_name')->nullable();
            $table->integer('selected_navigation')->nullable();
            $table->integer('menu_limit')->nullable();
            $table->string('recaptcha_site_key')->nullable();
            $table->string('recaptcha_secret_key')->nullable();
            $table->string('recaptcha_lang')->nullable();
            $table->text('custom_css_codes')->nullable();
            $table->text('custom_javascript_codes')->nullable();
            $table->string('mail_library')->nullable();
            $table->string('mail_protocol')->nullable();
            $table->string('mail_encryption')->nullable();
            $table->string('mail_host')->nullable();
            $table->string('mail_port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_title')->nullable();
            $table->string('mail_reply_to')->nullable();
            $table->integer('email_verification')->nullable();
            $table->string('facebook_app_id')->nullable();
            $table->string('facebook_app_secret')->nullable();
            $table->string('google_client_id')->nullable();
            $table->string('google_client_secret')->nullable();
            $table->string('vk_app_id')->nullable();
            $table->string('vk_secure_key')->nullable();
            $table->text('google_analytics')->nullable();
            $table->integer('promoted_products')->nullable();
            $table->integer('multilingual_system')->nullable();
            $table->integer('product_comments')->nullable();
            $table->integer('comment_approval_system')->nullable();
            $table->integer('reviews')->nullable();
            $table->integer('blog_comments')->nullable();
            $table->integer('slider_status')->nullable();
            $table->string('slider_type')->nullable();
            $table->string('slider_effect')->nullable();
            $table->integer('featured_categories')->nullable();
            $table->integer('index_promoted_products')->nullable();
            $table->integer('index_promoted_products_count')->nullable();
            $table->integer('index_latest_products')->nullable();
            $table->integer('index_latest_products_count')->nullable();
            $table->integer('index_blog_slider')->nullable();
            $table->string('product_link_structure')->nullable();
            $table->string('mds_key')->nullable();
            $table->string('purchase_code')->nullable();
            $table->string('site_color')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_email')->nullable();
            $table->string('favicon')->nullable();
            $table->string('watermark_image_large')->nullable();
            $table->string('watermark_image_mid')->nullable();
            $table->string('watermark_image_small')->nullable();
            $table->string('watermark_vrt_alignment')->nullable();
            $table->string('watermark_hor_alignment')->nullable();
            $table->integer('watermark_product_images')->nullable();
            $table->integer('watermark_blog_images')->nullable();
            $table->integer('watermark_thumbnail_images')->nullable();
            $table->text('facebook_comment')->nullable();
            $table->integer('facebook_comment_status')->nullable();
            $table->integer('product_cache_system')->nullable();
            $table->integer('static_content_cache_system')->nullable();
            $table->integer('refresh_cache_database_changes')->nullable();
            $table->integer('cache_refresh_time')->nullable();
            $table->integer('rss_system')->nullable();
            $table->integer('approve_before_publishing')->nullable();
            $table->integer('commission_rate')->nullable();
            $table->integer('send_email_new_product')->nullable();
            $table->integer('send_email_buyer_purchase')->nullable();
            $table->integer('send_email_contact_messages')->nullable();
            $table->integer('send_email_order_shipped')->nullable();
            $table->integer('send_email_shop_opening_request')->nullable();
            $table->integer('send_email_bidding_system')->nullable();
            $table->string('mail_options_account')->nullable();
            $table->integer('vendor_verification_system')->nullable();
            $table->integer('hide_vendor_contact_information')->nullable();
            $table->integer('guest_checkout')->nullable();
            $table->string('maintenance_mode_title')->nullable();
            $table->string('maintenance_mode_description')->nullable();
            $table->integer('maintenance_mode_status')->nullable();
            $table->bigInteger('max_file_size_image')->nullable();
            $table->bigInteger('max_file_size_video')->nullable();
            $table->bigInteger('max_file_size_audio')->nullable();
            $table->string('google_adsense_code')->nullable();
            $table->string('sort_categories')->nullable();
            $table->integer('sort_parent_categories_by_order')->nullable();
            $table->integer('pwa_status')->nullable();
            $table->integer('location_search_header')->nullable();
            $table->integer('vendor_bulk_product_upload')->nullable();
            $table->integer('show_sold_products')->nullable();
            $table->integer('newsletter_status')->nullable();
            $table->integer('newsletter_popup')->nullable();
            $table->integer('request_documents_vendors')->nullable();
            $table->string('explanation_documents_vendors')->nullable();
            $table->dateTime('last_cron_update')->nullable();
            $table->dateTime('last_cron_update_long')->nullable();
            $table->string('version')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
}
