<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->integer('lang_id')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->text('link')->nullable();
            $table->integer('item_order')->nullable();
            $table->string('button_text')->nullable();
            $table->string('animation_title')->nullable();
            $table->string('animation_description')->nullable();
            $table->string('animation_button')->nullable();
            $table->string('image')->nullable();
            $table->string('image_mobile')->nullable();
            $table->string('text_color')->nullable();
            $table->string('button_color')->nullable();
            $table->string('button_text_color')->nullable();
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
        Schema::dropIfExists('sliders');
    }
}
