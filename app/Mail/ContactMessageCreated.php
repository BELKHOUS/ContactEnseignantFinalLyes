<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $prenom;
    public $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$prenom,$code)
    {
        $this->email = $email;
        $this->prenom = $prenom;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.message.created');
    }
}
