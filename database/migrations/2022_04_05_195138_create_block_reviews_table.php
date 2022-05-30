<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order');
            $table->string('active');
            $table->string('text')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('user')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('rate')->default('5');
            $table->string('product_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('block_reviews');
    }
}
