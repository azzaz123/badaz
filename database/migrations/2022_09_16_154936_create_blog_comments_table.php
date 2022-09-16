<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('comment')->nullable();
            $table->string('ip_address')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('blog_comments');
    }
}
