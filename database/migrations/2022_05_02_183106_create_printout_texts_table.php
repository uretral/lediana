<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintoutTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printout_texts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('printout_id');
            $table->integer('layout_id');
            $table->integer('spread_nr');
            $table->text('text')->nullable();
            $table->integer('font_name')->nullable();
            $table->integer('font_size')->nullable();
            $table->string('font_color')->nullable();
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
        Schema::dropIfExists('printout_texts');
    }
}
