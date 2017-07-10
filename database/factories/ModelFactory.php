<?php

use App\Enums\ApiKeyStatuses;
use App\Enums\ClientSources;
use Ramsey\Uuid\Uuid;

$factory->define(App\ApiKey::class, function (Faker\Generator $faker) {
    return [
        'uuid' => Uuid::uuid4()->toString(),
        'email' => $faker->unique()->safeEmail,
        'status' => ApiKeyStatuses::OK,
        'source' => ClientSources::CHROME
    ];
});
