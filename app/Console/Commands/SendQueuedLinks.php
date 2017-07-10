<?php

namespace App\Console\Commands;

use App\ApiKey;
use Illuminate\Console\Command;

class SendQueuedLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'links:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send queued links';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Sending queued links...');

        $apiKeys = ApiKey::all();

        $progressBar = $this->output->createProgressBar(count($apiKeys));

        foreach ($apiKeys as $apiKey) {
            $apiKey->sendQueuedLinks();
            $progressBar->advance();
        }

        $progressBar->finish();

        $this->info(' Queued links sent!');
    }
}
