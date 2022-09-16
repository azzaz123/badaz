<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_plans', function (Blueprint $table) {
            $table->id();
            $table->text('title_array')->nullable();
            $table->integer('number_of_ads')->nullable();
            $table->integer('number_of_days')->nullable();
            $table->bigInteger('price')->nullable();
            $table->integer('is_free')->nullable();
            $table->integer('is_unlimited_number_of_ads')->nullable();
            $table->integer('is_unlimited_time')->nullable();
            $table->text('features_array')->nullable();
            $table->integer('plan_order')->nullable();
            $table->integer('is_popular')->nullable();
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
        Schema::dropIfExists('membership_plans');
    }
}
