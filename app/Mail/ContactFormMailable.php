<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMailable extends Mailable
{
    use Queueable, SerializesModels;

    protected $contactForm;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contactForm)
    {
        $this->contactForm = $contactForm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   //dd( $this->contactForm['message']);

        return $this->view('emails.contact-form')
                ->with([
                        'name' => $this->contactForm['name'],
                        'email' => $this->contactForm['email'],
                        'telephone' => $this->contactForm['telephone'],
                        'mymessage' => $this->contactForm['message'],
                    ]);
    }
}
