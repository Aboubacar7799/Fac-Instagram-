<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvoiCode extends Mailable
{
    use Queueable, SerializesModels;
    public $activation_token, $activation_code, $name;
    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.confirmation_email')
            ->with([
                'activation_token' => $this->activation_token,
                'activation_code' => $this->activation_code,
                'name' => $this->name,
            ]);
    }
}
