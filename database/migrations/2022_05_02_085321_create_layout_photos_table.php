<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayoutPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layout_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->double('top')->nullable();
            $table->double('bottom')->nullable();
            $table->double('left')->nullable();
            $table->double('right')->nullable();
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
        Schema::dropIfExists('layout_photos');
    }
}
