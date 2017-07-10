<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksQueuedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queued_links', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('api_key_id')->unsigned();
            $table->foreign('api_key_id')->references('id')->on('api_keys');
            $table->string('link', 255);
            $table->string('title', 255);
            $table->string('thumbnail', 255);
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
        Schema::dropIfExists('queued_links');
    }
}
