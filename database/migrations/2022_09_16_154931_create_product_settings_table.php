<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('marketplace_sku')->nullable();
            $table->integer('marketplace_variations')->nullable();
            $table->integer('marketplace_shipping')->nullable();
            $table->integer('marketplace_product_location')->nullable();
            $table->integer('classified_price')->nullable();
            $table->integer('classified_price_required')->nullable();
            $table->integer('classified_product_location')->nullable();
            $table->integer('classified_external_link')->nullable();
            $table->integer('physical_demo_url')->nullable();
            $table->integer('physical_video_preview')->nullable();
            $table->integer('physical_audio_preview')->nullable();
            $table->integer('digital_demo_url')->nullable();
            $table->integer('digital_video_preview')->nullable();
            $table->integer('digital_audio_preview')->nullable();
            $table->string('digital_allowed_file_extensions')->nullable();
            $table->string('sitemap_frequency')->nullable();
            $table->string('sitemap_last_modification')->nullable();
            $table->string('sitemap_priority')->nullable();
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
        Schema::dropIfExists('product_settings');
    }
}
