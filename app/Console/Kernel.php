<?php

namespace App\Console;

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
        Commands\MonitorCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $filePath = 'command.log';

        $minutes = array(1, 5, 10, 30, 60);

        foreach ($minutes as $minute) {
            // run tests every minute
            $schedule->command('monitor:run ' . $minute)->cron('*/' . $minute . ' * * * *')
                ->withoutOverlapping()
                ->onOneServer()
                ->runInBackground()
                ->evenInMaintenanceMode()
                // ->appendOutputTo($filePath)
                ->emailOutputTo('benedikt.poller+monitor@gmail.com');
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
