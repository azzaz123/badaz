<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('tree_id')->nullable();
            $table->integer('level')->nullable();
            $table->string('parent_tree')->nullable();
            $table->string('title_meta_tag')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->integer('category_order')->nullable();
            $table->integer('featured_order')->nullable();
            $table->integer('homepage_order')->nullable();
            $table->integer('visibility')->nullable();
            $table->integer('is_featured')->nullable();
            $table->integer('show_on_main_menu')->nullable();
            $table->integer('show_image_on_main_menu')->nullable();
            $table->integer('show_products_on_index')->nullable();
            $table->integer('show_subcategory_products')->nullable();
            $table->string('storage')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
