<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public string $name; // User's name
    public string $email; // User's email

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.user_registration_confirmation') 
                    ->with([
                        'name' => $this->name, 
                        'email' => $this->email, 
                    ])
                    ->subject('Registration Confirmation'); 
    }
}
