<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PriceSubscriptionNotificationIsAboveTheLimit extends Notification
{
    use Queueable;

    public $price;
    public $priceLimit;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($price, $priceLimit)
    {
        $this->price = $price;
        $this->priceLimit = $priceLimit;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello!')
                    ->line('The price of the Bitcoin is above your price limit.')
                    ->line('Bitcon price: ' . $this->price)
                    ->line('Your price limit: ' . $this->priceLimit);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
