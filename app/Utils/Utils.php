<?php

namespace App\Utils;

use DOMDocument;
use DOMXPath;
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
        try {
            $document = new DOMDocument();
            @$document->loadHTMLFile($url);
            $xpath = new DOMXPath($document);

            return str_replace("\n", " ", trim($xpath->query('//title')->item(0)->nodeValue));
        } catch (Exception $e) {
            return "(no title)";
        }
    }
}