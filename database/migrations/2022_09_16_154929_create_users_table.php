<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('slug')->nullable();
            $table->string('email')->nullable();
            $table->integer('email_status')->nullable();
            $table->string('token')->nullable();
            $table->string('password')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('has_active_shop')->nullable();
            $table->bigInteger('balance')->nullable();
            $table->integer('number_of_sales')->nullable();
            $table->string('user_type')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('vkontakte_id')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('cover_image_type')->nullable();
            $table->integer('banned')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('about_me')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->integer('show_email')->nullable();
            $table->integer('show_phone')->nullable();
            $table->integer('show_location')->nullable();
            $table->string('personal_website_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('vk_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('whatsapp_url')->nullable();
            $table->string('telegram_url')->nullable();
            $table->dateTime('last_seen')->nullable();
            $table->integer('show_rss_feeds')->nullable();
            $table->integer('send_email_new_message')->nullable();
            $table->integer('is_active_shop_request')->nullable();
            $table->string('vendor_documents')->nullable();
            $table->integer('is_membership_plan_expired')->nullable();
            $table->integer('is_used_free_plan')->nullable();
            $table->integer('cash_on_delivery')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('users');
    }
}
