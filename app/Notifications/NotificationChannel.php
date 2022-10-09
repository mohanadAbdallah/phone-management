<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;

class NotificationChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toNotifications($notifiable);



    }
    public function sendShop($notifiable, Notification $notification)
    {
        $message = $notification->toNotifications($notifiable);
    }
}
