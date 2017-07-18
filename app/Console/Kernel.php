<?php

namespace App\Console;

use App\Console\Commands\ImportCSV;
use App\Console\Commands\SendQueuedLinks;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SendQueuedLinks::class,
        ImportCSV::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Send queued links everyday
        $schedule->command("links:send")->dailyAt("06:00")->timezone("UTC");

        // Used to combat memory creep issues that I can't solve otherwise at this moment.
        $schedule->command('queue:restart')->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
