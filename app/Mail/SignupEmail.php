<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email_data = $data; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.signupemail', ['email_data' => $this->email_data])
            ->subject('Welcome to ' . config('app.name'))
            ->from(config('mail.from.address'), config('mail.from.name'));

    
        
       


        // return $this->from(env('MAIL_USERNAME'), 'Manny Website')->subject("Welcome to Coderaweso.me!")->view('mail.signupemail', ['email_data' => $this->email_data])

        
    }
}
 