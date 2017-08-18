<?php

namespace App\Enums;

abstract class Configurations
{
    const MAX_SEND = "max_send";

    public static function getAll()
    {
        return [self::MAX_SEND];
    }
}