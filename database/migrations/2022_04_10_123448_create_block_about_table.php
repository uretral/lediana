<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_about', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('stat_sizes')->nullable();
            $table->text('stat_sizes_text')->nullable();
            $table->string('stat_pages')->nullable();
            $table->text('stat_pages_text')->nullable();
            $table->string('stat_covers')->nullable();
            $table->text('stat_covers_text')->nullable();
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
        Schema::dropIfExists('block_about');
    }
}
