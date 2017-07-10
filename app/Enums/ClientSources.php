<?php

namespace App\Enums;

abstract class ClientSources
{
    const BOOKMARKLET = "bookmarklet";
    const CHROME = "chrome";
    const IOS = "ios";

    public static function getAll()
    {
        return [self::BOOKMARKLET, self::CHROME, self::IOS];
    }
}