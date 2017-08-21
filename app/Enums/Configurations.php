<?php

namespace App\Enums;

abstract class Configurations
{
    const MAX_SEND = "max_send";
    const MAX_SEND_PER_ACCOUNT = "max_send_per_account";

    public static function getAll()
    {
        return [self::MAX_SEND, self::MAX_SEND_PER_ACCOUNT];
    }
}