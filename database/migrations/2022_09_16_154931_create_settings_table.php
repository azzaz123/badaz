<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('lang_id')->nullable();
            $table->integer('site_font')->nullable();
            $table->integer('dashboard_font')->nullable();
            $table->string('site_title')->nullable();
            $table->string('homepage_title')->nullable();
            $table->string('site_description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('vk_url')->nullable();
            $table->string('whatsapp_url')->nullable();
            $table->string('telegram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('about_footer')->nullable();
            $table->text('contact_text')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('copyright')->nullable();
            $table->integer('cookies_warning')->nullable();
            $table->text('cookies_warning_text')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
