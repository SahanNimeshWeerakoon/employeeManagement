<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $sub;
    public $mes;
    public $email;

    public function __construct($subject, $message, $email)
    {
        $this->sub = $subject;
        $this->mes = $message;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = $this->sub;
        $e_message = $this->mes;
        $e_email = $this->email;

        return $this->view('mail.sendemail')->with(['e_message'=>$e_message, 'e_email'=>$e_email])->subject($e_subject);
    }
}
