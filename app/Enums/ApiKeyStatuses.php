<?php

namespace App\Enums;

abstract class ApiKeyStatuses
{
    const NEED_CHECK = "need_check";
    const OK = "ok";
    const REVOKED = "revoked";

    public static function getAll()
    {
        return [self::NEED_CHECK, self::OK, self::REVOKED];
    }
}