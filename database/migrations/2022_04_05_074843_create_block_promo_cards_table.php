<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockPromoCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_promo_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_id');
            $table->integer('order')->default('100');
            $table->string('active')->default('1');
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->string('img')->nullable();
            $table->string('img_mobile')->nullable();
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
        Schema::dropIfExists('block_promo_cards');
    }
}
