<?php

namespace App\Console\Commands;

use App\Models\Mobile;
use App\Notifications\requiredPaymentNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class sendNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:sent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $user = \App\Models\User::find(1);
        $mobilePayments = Mobile::with('mobile_payments')
            ->where('date', '<=', Carbon::now()->subDays(30)->toDateTimeString())
            ->get();
        foreach ($mobilePayments as $mobilePayment){
            $user->notify(new requiredPaymentNotification($mobilePayment));
        }
    }
}
