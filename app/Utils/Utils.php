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
        return exec("node " . env("SCREENSHOTER_PATH") . " $url " . env("SCREENSHOTER_DESTINATION_FOLDER"));
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