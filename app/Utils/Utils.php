<?php

namespace App\Utils;

use Exception;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Screen\Capture;
use Spatie\Browsershot\Browsershot;
use Spatie\Image\Manipulations;

class Utils
{
    /**
     * Get a website thumbnail from URL
     * @param string $url
     * @return string
     */
    public static function getWebsiteThumbnail(string $url)
    {
        try
        {
            $thumbnailPath = Uuid::uuid4()->toString() . '.jpg';

            Browsershot::url($url)
                ->windowSize(1600, 900)
                ->fit(Manipulations::FIT_CONTAIN, 1024, 768)
                ->timeout(10)
                ->save(storage_path("app/thumbnails/$thumbnailPath"));

            return $thumbnailPath;
        }

        catch (Exception $e)
        {
            return "";
        }
    }

    public static function getWebsiteTitle($url)
    {
        $page = file_get_contents($url);

        if (!$page) {
            return "(no title)";
        }

        $matches = [];

        if (preg_match('/<title>(.*?)<\/title>/', $page, $matches)) {
            return $matches[1];
        }

        return "(no title)";
    }
}