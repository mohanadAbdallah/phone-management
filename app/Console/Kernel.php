<?php

namespace App\Console;

use App\Console\Commands\sendNotificationCommand;
use App\Models\Mobile;
use App\Models\User;
use App\Notifications\requiredPaymentNotification;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Notification;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        sendNotificationCommand::class,
        ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('model:prune')->daily();
        $schedule->command('notification:sent')->daily();
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
