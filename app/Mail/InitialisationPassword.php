<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InitialisationPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $activation_token, $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($activation_token, $name)
    {
        $this->activation_token = $activation_token;
        $this->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.initial_pwd')
            ->with([
                'activation_token' => $this->activation_token,
                'name' => $this->name,
            ]);
    }
}
