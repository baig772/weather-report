<?php

namespace App\Console;

use App\Console\Commands\ImportWeather;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
      ImportWeather::class
    ];


    protected function schedule(Schedule $schedule): void
    {
         $schedule->command('import:weather')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
