<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GuardianWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $guardian;
    public $plainPassword;

    /**
     * Create a new message instance.
     */
    public function __construct($guardian, $plainPassword)
    {
        $this->guardian = $guardian;
        $this->plainPassword = $plainPassword;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Welcome to Guardian Portal')
                    ->view('emails.guardian_welcome');
    }
}