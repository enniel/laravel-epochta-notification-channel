<?php

namespace NotificationChannels\Epochta;

use NotificationChannels\Epochta\Exceptions\CouldNotSendNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Event;
use Enniel\Epochta\Facades\SMS;

class EpochtaChannel
{
    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws \NotificationChannels\Epochta\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toEpochta($notifiable);
        if (is_string($message)) {
            $message = EpochtaMessage::create($message);
        }
        if ($message->toNotGiven()) {
            if (! $to = $notifiable->routeNotificationFor('epochta')) {
                throw CouldNotSendNotification::missingRecipient();
            }
            $message->to($to);
        }
        $response = SMS::sendSMS($message->toArray());
        Event::fire(new MessageWasSended($response, $notifiable));
    }
}
