<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class requiredPaymentNotification extends Notification
{
    use Queueable;
    public $mobilePayment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mobilePayment)
    {
        $this->mobilePayment = $mobilePayment;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            'mobile_name'=>$this->mobilePayment->mobile_name,
            'customer_name'=>$this->mobilePayment->customer->customer_name,
            'customer_id'=>$this->mobilePayment->customer->id,
        ];
    }
}
