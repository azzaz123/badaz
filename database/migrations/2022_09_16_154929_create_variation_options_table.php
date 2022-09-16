<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariationOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variation_options', function (Blueprint $table) {
            $table->id();
            $table->integer('variation_id')->nullable();
            $table->integer('parent_id')->nullable();
            $table->text('option_names')->nullable();
            $table->integer('stock')->nullable();
            $table->string('color')->nullable();
            $table->bigInteger('price')->nullable();
            $table->integer('discount_rate')->nullable();
            $table->integer('is_default')->nullable();
            $table->integer('use_default_price')->nullable();
            $table->integer('no_discount')->nullable();
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
        Schema::dropIfExists('variation_options');
    }
}
