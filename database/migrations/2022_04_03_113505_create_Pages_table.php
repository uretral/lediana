<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->integer('order');
            $table->integer('status')->default('1');
            $table->string('title');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->string('slug');
            $table->string('type');
            $table->string('blocks');
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
        Schema::dropIfExists('Pages');
    }
}
