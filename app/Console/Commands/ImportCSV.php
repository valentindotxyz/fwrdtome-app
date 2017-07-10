<?php

namespace App\Console\Commands;

use App\ApiKey;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use League\Csv\Reader;

class ImportCSV extends Command
{
    protected $signature = 'csv:import';
    protected $description = 'Import API keys from previous version';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $reader = Reader::createFromPath(storage_path('api_keys_v1.csv'));

        $nbRowsToImport = $reader->each(function ($row) { return true; });

        $progressBar = $this->output->createProgressBar($nbRowsToImport);

        foreach ($reader as $index => $row) {
            list($id, $uuid, $email, $email_check, $email_retries, $type, $status, $created_at, $updated_at) = $row;

            ApiKey::create([
                "uuid" => $uuid,
                "email" => $email,
                "source" => strtolower($type),
                "status" => strtolower($status),
                "email_check" => $email_check,
                "email_retries" => $email_retries,
                "created_at" => $created_at,
                "updated_at" => $updated_at
            ]);

            $progressBar->advance();
        }

        $progressBar->finish();

        $this->info(' CSV file imported!');
    }
}
