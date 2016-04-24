<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->enum('event', ['SENT'])->default('SENT');
            $table->string('ip', 255);
            $table->string('url', 255);
            $table->string('title', 255);

            $table->integer('api_key')->unsigned();
            $table->foreign('api_key')->references('id')->on('api_keys');

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
        Schema::drop('logs');
    }
}
