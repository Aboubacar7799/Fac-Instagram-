<?php

namespace App\Notifications;

use view;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EnvoiCode extends Notification
{
    use Queueable;
    public $activation_token, $activation_code, $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($activation_token, $activation_code, $name)
    {
        $this->activation_code = $activation_code;
        $this->activation_token = $activation_token;
        $this->name;
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

    public function build()
    {
        return $this->view('mail.confirmation_email')
            ->with([
                'activation_code' => $this->activation_code,
                'activation_code' => $this->activation_code,
                'name' => $this->name,
            ]);
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
