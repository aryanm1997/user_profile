<?php

namespace App\Jobs;

use App\Mail\UserRegistrationConfirmation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendConfirmationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $name; // User's name
    public string $email; // User's email

    /**
     * Create a new job instance.
     *
     * @param string $name
     * @param string $email
     * @return void
     */
    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Send the confirmation email
        Mail::to($this->email)->send(new UserRegistrationConfirmation($this->name, $this->email));
    }
}
