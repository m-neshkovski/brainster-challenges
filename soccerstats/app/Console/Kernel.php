<?php

namespace App\Console;

use App\Console\Commands\CreateUserCommand;
use App\Console\Commands\AddRandomResultToFinishedMatches;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        'soccer:createadmin' => CreateUserCommand::class,
        'soccer:finished' => AddRandomResultToFinishedMatches::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('soccer:finished')->dailyAt('00:01');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
