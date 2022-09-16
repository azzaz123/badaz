<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingZoneMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_zone_methods', function (Blueprint $table) {
            $table->id();
            $table->text('name_array')->nullable();
            $table->integer('zone_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('method_type')->nullable();
            $table->string('flat_rate_cost_calculation_type')->nullable();
            $table->bigInteger('flat_rate_cost')->nullable();
            $table->text('flat_rate_class_costs_array')->nullable();
            $table->bigInteger('local_pickup_cost')->nullable();
            $table->bigInteger('free_shipping_min_amount')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('shipping_zone_methods');
    }
}
