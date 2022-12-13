<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuizResults extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public String $email;
    public String $name;
    public array $oil;



    public function __construct($email, $name, $oil)
    {
        $this->email = $email;
        $this->name = $name;
        $this->oil = $oil;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(ENV('MAIL_FROM_ADDRESS', 'ryan@medwigjm.com'), 'Medwigs')
            ->view('emails.results');
    }
}
