<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Invokables\DeleteOldJobs;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule
        //     ->command('inspire')
        //     ->everyTenSeconds()
        //     ->appendOutputTo(storage_path('logs/scheduler-output.log'));

        $schedule->call(new DeleteOldJobs)->everyFourHours($minutes = 0);
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
