<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Message\Topics;

class UserNotify extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $fcm_title;
    protected $fcm_body;
    protected $notification_data;
    protected $notification_id;

    public function __construct( $fcm_title, $fcm_body,  $notification_data = [])
    {
        $this->fcm_title = $fcm_title;
        $this->fcm_body = $fcm_body;
        $this->notification_data = $notification_data;
        $this->notification_id = rand(1000000, 9999999);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [NotificationChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return null;

    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [];
    }


        public function toNotifications($notifiable)
    {

        $data = $this->notification_data;
        $data['notification_id'] = $this->notification_id;
        $data['title'] = $this->fcm_title;
        $data['body'] = $this->fcm_body;

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($this->fcm_title);
        $notificationBuilder->setBody($this->fcm_body)
            ->setSound('default');


        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData($data);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        foreach ($notifiable->fcm as $token) {
            $downstreamResponse = FCM::sendTo([$token->fcm_token], $option, $notification, $data);

        }

        }

    public function toNotificationsTopic()
    {
        $data = $this->notification_data;
        $data['title'] = $this->fcm_title;
        $data['body'] = $this->fcm_body;
        $notificationBuilder = new PayloadNotificationBuilder($data['title']);
        $notificationBuilder->setBody($data['body'])
            ->setSound('default');

        $notification = $notificationBuilder->build();
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData($data);
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();
        $topic = new Topics();
        $topic->topic('all');

        $topicResponse = FCM::sendToTopic($topic, null, $notification, null,$data);

        $topicResponse->isSuccess();
        $topicResponse->shouldRetry();
        $topicResponse->error();

    }

}
