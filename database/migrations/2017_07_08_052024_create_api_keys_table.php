<?php

use App\Enums\ApiKeyStatuses;
use App\Enums\ClientSources;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Ramsey\Uuid\Uuid;

class CreateApiKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_keys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid', 36);
            $table->string('email', 255);
            $table->enum('source', ClientSources::getAll())->default(ClientSources::BOOKMARKLET);
            $table->enum('status', ApiKeyStatuses::getAll())->default(ApiKeyStatuses::NEED_CHECK);
            $table->string('email_check', 255)->default(Uuid::uuid4()->toString());
            $table->smallInteger('email_retries', false, true)->default(0);
            $table->unique(['uuid', 'email'], 'unique_uuid_email');
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
        Schema::drop('api_keys');
    }
}
